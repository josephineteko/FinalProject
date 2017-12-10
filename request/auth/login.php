<?php
header("Content-Type:application/json");
include_once '../db_config.php';

if(!empty($_GET['username']) && !empty($_GET['password']))
{
  $username = $_GET['username'];
  $password = $_GET['password'];

  login($username, $password);
}
else
{
	response(400,"Invalid Request", "username or password is empty");
}

function login($username, $password) {
  try {
        // connection to the database.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD, $pdo_options);

        $crypt_password = md5($password);
        $sql = "SELECT id, username FROM user WHERE username='".$username."' AND password='".$crypt_password."'";

	$res = $bdd->query($sql);
	$output = $res->fetchAll(PDO::FETCH_OBJ);
	if (empty($output)) {
	   response(401,"User doesn't request",NULL);
	}
	else {
	   response(200,"User exist",$output);
	}
      } catch (Exception $e) {
      	response(402,"Error Server",NULL);
      }
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);

	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;

	$json_response = json_encode($response);
	echo $json_response;
}
