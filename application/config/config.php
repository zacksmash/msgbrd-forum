<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 0);

/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */
define('URL', 'http://local.forum/');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'forum');
define('DB_USER', 'root');
define('DB_PASS', 'root');

/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is,
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development .127.0.0.1 or .localhost is fine, but when deploying you should
 * change this to your real domain, like '.mydomain.com' ! The leading dot makes the cookie available for
 * sub-domains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see http://www.php.net/manual/en/function.setcookie.php
 *
 * COOKIE_RUNTIME: How long should a cookie be valid ? 1209600 seconds = 2 weeks
 * COOKIE_DOMAIN: The domain where the cookie is valid for, like '.mydomain.com'
 * COOKIE_SECRET_KEY: Put a random value here to make your app more secure. When changed, all cookies are reset.
 */
define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".127.0.0.1");
define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");

/**
 * Configuration for: Email server credentials
 *
 * Here you can define how you want to send emails.
 * If you have successfully set up a mail server on your linux server and you know
 * what you do, then you can skip this section. Otherwise please set EMAIL_USE_SMTP to true
 * and fill in your SMTP provider account data.
 *
 * An example setup for using gmail.com [Google Mail] as email sending service,
 * works perfectly in August 2013. Change the "xxx" to your needs.
 * Please note that there are several issues with gmail, like gmail will block your server
 * for "spam" reasons or you'll have a daily sending limit. See the readme.md for more info.
 *
 * define("EMAIL_USE_SMTP", true);
 * define("EMAIL_SMTP_HOST", "ssl://smtp.gmail.com");
 * define("EMAIL_SMTP_AUTH", true);
 * define("EMAIL_SMTP_USERNAME", "xxxxxxxxxx@gmail.com");
 * define("EMAIL_SMTP_PASSWORD", "xxxxxxxxxxxxxxxxxxxx");
 * define("EMAIL_SMTP_PORT", 465);
 * define("EMAIL_SMTP_ENCRYPTION", "ssl");
 *
 * It's really recommended to use SMTP!
 *
 */
define("EMAIL_USE_SMTP", false);
define("EMAIL_SMTP_HOST", "yourhost");
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "yourusername");
define("EMAIL_SMTP_PASSWORD", "yourpassword");
define("EMAIL_SMTP_PORT", 465);
define("EMAIL_SMTP_ENCRYPTION", "ssl");

/**
 * Configuration for: password reset email data
 * Set the absolute URL to password_reset.php, necessary for email password reset links
 */
define("EMAIL_PASSWORDRESET_URL", "http://local.forum/password_reset/");
define("EMAIL_PASSWORDRESET_FROM", "no-reply@example.com");
define("EMAIL_PASSWORDRESET_FROM_NAME", "My Project");
define("EMAIL_PASSWORDRESET_SUBJECT", "Password reset for PROJECT XY");
define("EMAIL_PASSWORDRESET_CONTENT", "Please click on this link to reset your password:");

/**
 * Configuration for: verification email data
 * Set the absolute URL to register.php, necessary for email verification links
 */
define("EMAIL_VERIFICATION_URL", "http://local.forum/");
define("EMAIL_VERIFICATION_FROM", "no-reply@example.com");
define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
define("EMAIL_VERIFICATION_SUBJECT", "Account activation for PROJECT XY");
define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account:");

/**
 * Configuration for: post reply email data
 * Set the absolute URL to register.php, necessary for email verification links
 */
define("EMAIL_POST_REPLY_URL", "http://local.forum/discussion/");
define("EMAIL_POST_REPLY_FROM", "no-reply@example.com");
define("EMAIL_POST_REPLY_FROM_NAME", "MsgBrd Notification");
define("EMAIL_POST_REPLY_SUBJECT", "New Post Reply");
define("EMAIL_POST_REPLY_CONTENT_ONE", "Hey, there! \n\n A new reply has been added to your discussion.\n\n");
define("EMAIL_POST_REPLY_CONTENT_TWO", "\n\nClick here to view it: ");

/**
 * Configuration for: Hashing strength
 * This is the place where you define the strength of your password hashing/salting
 *
 * To make password encryption very safe and future-proof, the PHP 5.5 hashing/salting functions
 * come with a clever so called COST FACTOR. This number defines the base-2 logarithm of the rounds of hashing,
 * something like 2^12 if your cost factor is 12. By the way, 2^12 would be 4096 rounds of hashing, doubling the
 * round with each increase of the cost factor and therefore doubling the CPU power it needs.
 * Currently, in 2013, the developers of this functions have chosen a cost factor of 10, which fits most standard
 * server setups. When time goes by and server power becomes much more powerful, it might be useful to increase
 * the cost factor, to make the password hashing one step more secure. Have a look here
 * (@see https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
 * in the BLOWFISH benchmark table to get an idea how this factor behaves. For most people this is irrelevant,
 * but after some years this might be very very useful to keep the encryption of your database up to date.
 *
 * Remember: Every time a user registers or tries to log in (!) this calculation will be done.
 * Don't change this if you don't know what you do.
 *
 * To get more information about the best cost factor please have a look here
 * @see http://stackoverflow.com/q/4443476/1114320
 *
 * This constant will be used in the login and the registration class.
 */
define("HASH_COST_FACTOR", "10");