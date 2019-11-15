<?php
// Database setup script

require_once('./connect.php');

try {
	// select db to use
	$str = "USE `".DB_NAME."`;\n\n";

	// clear the existing table
	$str = "DROP TABLE `rd_users`;\n\n";

	// recreate the table
	$str = "CREATE TABLE `rd_users` (\n".
	"`id` int(11) AUTO_INCREMENT NOT NULL,\n".
	"`first_name` varchar(45) NOT NULL,\n".
	"`last_name` varchar(45) NOT NULL,\n".
	"`email` varchar(45) NOT NULL,\n".
	"`phone` varchar(45) NOT NULL\n".
	"PRIMARY KEY(`id`)\n".
	");";

	$query = $str;
	// exec the query
	$con->exec($query);
	echo json_encode("Success!");
} catch (PDOException $e) {
	die($e->getMessage());
}



