<?php
/* NicEdit - Micro Inline WYSIWYG
 * Copyright 2007-2009 Brian Kirchoff
 *
 * NicEdit is distributed under the terms of the MIT license
 * For more information visit http://nicedit.com/
 * Do not remove this copyright message
 *
 * nicUpload Reciever Script PHP Edition
 * @description: upload image to imageshack and return the URL of the image to the client for use in nicEdit
 * @author: Brian Kirchoff <briankircho@gmail.com>
 * @author: Jean-Marie Tinghir <jmtinghir.net>
 * @version: 0.9.0
 */
require_once(realpath(dirname(__FILE__)."/imageshack.class.php"));

define('API_KEY', '02ACEJNQ8b07342d85c0fb851574e07051bb3dd3');

$nicupload_allowed_extensions = array('jpg','jpeg','png','gif','bmp');

// You should not need to modify below this line

$rfc1867 = function_exists('apc_fetch') && ini_get('apc.rfc1867');

if (!function_exists('json_encode')) {
	die('{"error" : "Image upload host does not have the required dependicies (json_encode/decode)"}');
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
	// Upload is complete

	if (isset($_POST['APC_UPLOAD_PROGRESS']) && !empty($_POST['APC_UPLOAD_PROGRESS'])) {
		$id = $_POST['APC_UPLOAD_PROGRESS'];
	} else {
		$id = $_GET['id'];
	}
	if (empty($id) || !is_numeric($id)) {
		nicupload_error('Invalid Upload ID');
	}

	$file = $_FILES['nicImage'];
	$image = $file['tmp_name'];

	$max_upload_size = ini_max_upload_size();
	if (!$file) {
		nicupload_error('Must be less than '.bytes_to_readable($max_upload_size));
	}

	$ext = strtolower(substr(strrchr($file['name'], '.'), 1));
	@$size = getimagesize($image);
	if (!$size || !in_array($ext, $nicupload_allowed_extensions)) {
		nicupload_error('Invalid image file, must be a valid image less than '.bytes_to_readable($max_upload_size));
	}

	$filename = $id.'.'.$ext;

	$imgshack = new ImageShackUploader(API_KEY);
	$imgXml = $imgshack->upload($file);//, "800x800"
	$imgUrl = $imgXml->links->image_link;


	if ($rfc1867) {
		$status = apc_fetch('upload_'.$id);
	}
	if (!isset($status)) {
		$status = array();
	}
	$status['done'] = 1;
	$status['width'] = $size[0];
	$status['url'] = (string)$imgUrl;

	if ($rfc1867) {
		apc_store('upload_'.$id, $status);
	}

	nicupload_output($status, $rfc1867);
	exit;
} else if (isset($_GET['check'])) {
	// Upload progress check
	$check = $_GET['check'];
	if (!is_numeric($check)) {
		nicupload_error('Invalid upload progress id');
	}

	if ($rfc1867) {
		$status = apc_fetch('upload_'.$check);

		if ($status['total'] > 500000 && $status['current']/$status['total'] < 0.9 ) {
			// Large file and we are < 90% complete
			$status['interval'] = 3000;
		} else if ($status['total'] > 200000 && $status['current']/$status['total'] < 0.8 ) {
			// Is this a largeish file and we are < 80% complete
			$status['interval'] = 2000;
		} else {
			$status['interval'] = 1000;
		}

		nicupload_output($status);
	} else {
		$status = array();
		$status['noprogress'] = true;
		nicupload_output($status);
	}
}


// UTILITY FUNCTIONS

function nicupload_error($msg) {
	echo nicupload_output(array('error' => $msg));
}

function nicupload_output($status, $showLoadingMsg = false) {
	$script = '
        try {
            '.(($_SERVER['REQUEST_METHOD']=='POST') ? 'top.' : '').'nicUploadButton.statusCb('.json_encode($status).');
        } catch(e) { alert(e.message); }
    ';

	if($_SERVER['REQUEST_METHOD']=='POST') {
		echo '<script>'.$script.'</script>';
	} else {
		echo $script;
	}

	if($_SERVER['REQUEST_METHOD']=='POST' && $showLoadingMsg) {

		echo <<<END
    <html><body>
        <div id="uploadingMessage" style="text-align: center; font-size: 14px;">
            <img src="http://js.nicedit.com/ajax-loader.gif" style="float: right; margin-right: 40px;" />
            <strong>Uploading...</strong><br />
            Please wait
        </div>
    </body></html>
END;

	}

	exit;
}

function ini_max_upload_size() {
	$post_size = ini_get('post_max_size');
	$upload_size = ini_get('upload_max_filesize');
	if(!$post_size)
	$post_size = '8M';
	if(!$upload_size)
	$upload_size = '2M';

	return min( ini_bytes_from_string($post_size), ini_bytes_from_string($upload_size) );
}

function ini_bytes_from_string($val) {
	$val = trim($val);
	$last = strtolower($val[strlen($val)-1]);
	switch($last) {
		// The 'G' modifier is available since PHP 5.1.0
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}
	return $val;
}

function bytes_to_readable( $bytes ) {
	if ($bytes<=0)
	return '0 Byte';

	$convention=1000; //[1000->10^x|1024->2^x]
	$s=array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB');
	$e=floor(log($bytes,$convention));
	return round($bytes/pow($convention,$e),2).' '.$s[$e];
}
?>