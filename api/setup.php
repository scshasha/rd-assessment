<?php
// Database setup script

require_once('./connect.php');
// select db to use
$str = "USE `".DB_NAME."`;\n\n";

// clear the existing table
$str = "DROP TABLE `rd_users`;\n\n";

// recreate the table
$str = "CREATE TABLE `rd_users`;\n\n";


// prepare the sql stmnt


// exec the query


