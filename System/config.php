<?php
// Database Connection
$conn = new mysqli('localhost', 'Matsoda', '12345', 'fox_print');
global $conn;
// Some Defines
define('DS', DIRECTORY_SEPARATOR);
define('PROJECT'     , 'http://'.$_SERVER['HTTP_HOST'].'/');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

define('LANG', array('en', 'ar'));