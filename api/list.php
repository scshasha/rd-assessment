<?php
/**
 * @file
 * returns a list of users
 */

require_once('./connect.php');

$users = array();
$sql = "SELECT id,first_name,last_name,email,phone FROM rd_users";

if ($results = mysqli_query($con, $sql)) {
	$cr = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		$users[$cr]['id'] = $row['id'];
		$users[$cr]['first_name'] = $row['first_name'];
		$users[$cr]['last_name'] = $row['last_name'];
		$users[$cr]['email'] = $row['email'];
		$users[$cr]['phone'] = $row['phone'];
	}

	echo json_encode(array('data' => $users));
} else {
	http_response_code(404);
}