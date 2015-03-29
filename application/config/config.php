<?php

/**
 * Configuration
 *
 * For more info about constants please
 * @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const"
 * @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * useful to show every little problem during development, but only show hard
 * errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 0);

/**
 * Configuration for: Base URL
 * This is the base url of our app.
 * if you go live with the app, put your full domain name here.
 * if you are using a port(other than 80),then put this in here,
 * like http://mydomain:8888/subfolder/
 * Note: The trailing slash is important
 */
define('URL', 'http://192.168.137.1/hostel/');

/**
 * Configuration for: Folders
 * Here we define where our folders are.
 * There is no need to change this part unless you have renamed them.
 */
define('LIBS_PATH', 'application/libs/');
define('CONTROLLERS_PATH', 'application/controllers/');
define('MODELS_PATH', 'application/models/');
define('VIEWS_PATH', 'application/views/');

/**
 * Configuration for: Database
 * This is the place where we define our database credentials, type etc
 */
// database type
define('DB_TYPE', 'mysql');
// database host
define('DB_HOST', 'localhost');
// database name
define('DB_NAME', 'hostel');
// database user
define('DB_USER', 'root');
// password for the above user
define('DB_PASS', '');

/**
 * Configuration for: Hashing strength
 * This is the place where you define the strength of your password
 * hashing/salting
 *
 * To make password encryption very safe and future-proof, the PHP 5.5
 * hashing/salting functions come with a clever so called COST FACTOR. This
 * number defines the base-2 logarithm of the rounds of hashing, something like
 * 2^12 if your cost factor is 12. By the way, 2^12 would be 4096 rounds of
 * hashing, doubling the round with each increase of the cost factor and
 * therefore doubling the CPU power it needs. Currently, in 2013, the developers
 * of this functions have chosen a cost factor of 10, which fits most standard
 * server setups. When time goes by and server power becomes much more powerful,
 * it might be useful to increase the cost factor, to make the password hashing
 * one step more secure. Have a look here (@see https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
 * in the BLOWFISH benchmark table to get an idea how this factor behaves. For
 * most people this is irrelevant, but after some years this might be very very
 * useful to keep the encryption of your database up to date.
 *
 * Remember: Every time a user registers or tries to log in (!) this calculation
 * will be done. Don't change this if you don't know what you do.
 *
 * To get more information about the best cost factor please have a look here
 *
 * @see http://stackoverflow.com/q/4443476/1114320
 */

// the hash cost factor, PHP's internal default is 10. You can leave this line
// commented out until you need another factor then 10.
// define("HASH_COST_FACTOR", "10");

/**
 * Configuration for: Error message and notices
 *
 * In this project, the error message, notices etc are called "feedback"
 */
define("FEEDBACK_EMPTY_USERNAME", "Username field was empty");
define("FEEDBACK_EMPTY_PASSWORD", "Password field was empty");
define("FEEDBACK_EMPTY_NAME", "Name field was empty");
define("FEEDBACK_EMPTY_DEPARTMENT", "Department field was empty");
define("FEEDBACK_EMPTY_EMAIL", "Email field is empty");
define("FEEDBACK_ACCOUNT_CREATING_FAILED", "Account creation failed. please go back and try again");
define("FEEDBACK_ACCOUNT_CREATED", "The account have successfully created");

define("FEEDBACK_INVALID_USERNAME", "ID is invalid. please provide id as: A111111.");
define("FEEDBACK_INVALID_EMAIL", "Email address is invalid");

define("FEEDBACK_NO_USER", "No user available in this ID");
define('FEEDBACK_LOGIN_SUCCESSFUL', "Login Successful");
define('FEEDBACK_WRONG_PASSWORD', "Wrong Password");

/**
 * ERROR CODE
 */
define("FEEDBACK_EMPTY_USERNAME_CODE", 10);
define("FEEDBACK_EMPTY_PASSWORD_CODE", 11);
define("FEEDBACK_NO_USER_CODE", 12);
define("FEEDBACK_WRONG_PASSWORD_CODE", 13);

/**
 * SUCCESS CODEs
 */
define(FEEDBACK_LOGIN_SUCCESSFUL_CODE, 50);


