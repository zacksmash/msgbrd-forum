> :warning: This projects was, like, the first thing I've ever built. It should not be used for ANYTHING.

MsgBrd
=========

MsgBrd is an easy to use forum/message board for small projects.

  - Add discussions about Bugs, Features, Questions and Announcements
  - See the resolution of each discussion and reopen discussions
  - Notifications when another user replies to your post
  - Lots more!

Requirements
----
  - PHP 5.6
  - Short Open Tags enabled
  - Apache

Version
----

1.0

[Here's a demo](http://forum.ennoapps.com)

Installation
-----------

Install message board on your server or a local environment:

  - Download/Clone this repository and copy it to your server. Be sure to include the .htaccess file, or create it on your server in the main directory.
  - Create the database on your server
  - Edit each section of the config file with your db details (DB, Username, Password) as well as your the URL where the forum is located [application/config/config.php]
  - Run the SQL commands in the _install folder (run the create-admin.sql VERY last)
  - Delete the _install folder, if you'd like.
  - Log in using the administrator details (Username: Administrator, Password: admin1)
