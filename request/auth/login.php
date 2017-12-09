<?php
header("Content-Type:application/json");

if(!empty($_GET['username']) && !empty($_GET['password']))
{
  $username = $_GET['username'];
  $password = $_GET['password'];
  login($username, $password);
}
else
{
	response(400,"Invalid Request",NULL);
}

function login($username, $password) {
  try {
        // connection to the database.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=final_project', 'root', 'password', $pdo_options);

        $crypt_password = md5($password);
        $sql = "SELECT id, username FROM user WHERE username='".$username."' AND password='".$crypt_password."'";

	$res = $bdd->query($sql);
	$output = $res->fetchAll(PDO::FETCH_OBJ);
	if (empty($res)) {
	   response(401,"bad request",NULL);
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
