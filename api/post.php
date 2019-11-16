<?php
/**
 * @file
 * creates/saves a new user
 */

require_once('./connect.php');

$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
	$request = json_decode($postdata);

	if (trim($request->data->first_name) === '' || trim($request->data->last_name) === '' || trim($request->data->email) === '' || trim($request->data->phone) === '') {
		return http_response_code(400);
	}

	$firstname = mysqli_real_escape_string($con, trim($request->data->first_name));
	$lastname = mysqli_real_escape_string($con, trim($request->data->last_name));
	$email = mysqli_real_escape_string($con, trim($request->data->email));
	$phone = mysqli_real_escape_string($con, trim($request->data->phone));

	$sql = "INSERT INTO `rd_users`(`id`,`first_name`,`last_name`,`emal`,`phone`) VALUES(null,'{$firstname}','{$lastname}','{$emil}','{$phone}')";

	if (mysqli_query($con, $sql)) {
		http_response_code(201);
		$user = array(
			'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'phone' => $phone,
		);
        echo json_encode(array('data' => $user));
	} else {
        http_response_code(422);
    }
}