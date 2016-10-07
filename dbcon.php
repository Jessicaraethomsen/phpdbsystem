
<?php
const DB_HOST = 'jessicaraethomsen.dk.mysql';
const DB_USER = 'jessicaraethoms';
const DB_PASS = 'vKeJJ2C6';
const DB_NAME = 'jessicaraethoms';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) { 
	die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>