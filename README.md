# Cursive Coffee

This is a full-stack website that I built for a coffee shop based in Middlebury, VT. 

In order to view this locally, you will need to have a MySQL database named 'cursive_coffee' running on localhost with the following tables:

``` sql
CREATE TABLE `posts` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(225) DEFAULT NULL,
 `content` text,
 `preview` text NOT NULL,
 `date` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin
;

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1
;
```

(Add your user and password to the users table)

And then, edit /includes/dblogin.inc.php and input your user and password for the new database.
