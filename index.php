<?php

ini_set('memory_limit', '5054M'); 
error_reporting(0);
// Kickstart the framework

require 'vendor/autoload.php';
$f3 = \Base::instance();

$f3->set('CACHE',TRUE);

$f3->set('DEBUG',0);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');

/*
 * Database Connection
 */
 
$f3->set('AUTOLOAD','controller/');

include 'routes.php';


$f3->run();
