<?php

if (!file_exists(dirname(__FILE__) . '\\.env.json'))) { throw new Exception("Error reeadig credetials file.", 1); }

$config = json_decode(file_get_contents(dirname(__FILE__) . '\\.env.json'), true);

define('DB_HOST', $config['dbconfig']['host']);
define('DB_USER', $config['dbconfig']['username']);
define('DB_PASS', $config['dbconfig']['password']);
define('DB_NAME', $config['dbconfig']['database']);

function connect() {
	$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno($connect)) {
		die("Failed to connect: " . mysqli_connect_errno());
	}
	mysqli_set_charset($connect, "utf8");
	return $connect;
}

$con = connect();

