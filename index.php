<?php

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

define('APP_DEBUG',true);

define( "TOKEN", "D8g14207Q2q83Z2go3B1Bf332GgOo8Q3" );

define('APP_PATH','./Application/');

define( 'SITE_URL', 'localhost' );

require './ThinkPHP/ThinkPHP.php';

