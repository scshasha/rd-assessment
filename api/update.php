<?php

/**
 * @file
 * updates a user
 */

require_once('./connect.php');

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);
	
  if ((int)$request->data->id < 1 || trim($request->data->first_name) == '' ||trim($request->data->last_name) == '' ||trim($request->data->email) == '' ||trim($request->data->phone) == '' ||) {
    return http_response_code(400);
  }
    
  $id    = mysqli_real_escape_string($con, (int)$request->data->id);
  $firstname = mysqli_real_escape_string($con, trim($request->data->first_name));
  $lastname = mysqli_real_escape_string($con, (int)$request->data->last_name);
  $email = mysqli_real_escape_string($con, (int)$request->data->email);
  $phone = mysqli_real_escape_string($con, (int)$request->data->phone);

  $sql = "UPDATE `rd_users` SET `first_name`='$firstname',`last_name`='$lastname', `email`='{$email}', `phone`='{$phone}' WHERE `id` = '{$id}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
