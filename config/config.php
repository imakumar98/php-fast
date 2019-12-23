<?php

/**
 * Set your configurations
 *
 */


//Import environment file
require_once('env.php');


//If environment is `development` then import `config.dev.php`
if(ENV == 'development') require_once('config.dev.php');


//If environment is `production` then import `config.prod.php`
if(ENV == 'production') require_once('config.prod.php');


/**
 * 
 * Defines common configuration here i.e. configuration 
 * which are common in development and production environment
 * 
 */

//Define PHP default timezone
DEFINE('TIMEZONE', 'Asia/Kolkata');


//Defines Salt to generate hashed password
DEFINE('PASSWORD_HASHING_SALT', 'thisissecret');


//Define Developer mail address to receive errors
DEFINE('DEVELOPER_MAIL_ADDRESS', 'imakumar98@gmail.com');


?>