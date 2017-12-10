<?php
header("Content-Type:application/json");
include_once '../db_config.php';

if(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = $_POST['username'];
  $password = $_POST['password'];

	createUser($username, $password);


}
else
{
	response(400,"Invalid Request",NULL);
}

function createUser($username, $password) {
  try {
        // connection to the database.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD, $pdo_options);

				$date = new DateTime();
				$newDate = $date->format('Y-m-d H:i:s');
        $crypt_password = md5($password);
        $sql = "INSERT INTO user (username, password, last_auth) VALUES ('".$username."', '".$crypt_password."', '".$newDate."')";

        $res = $bdd->query($sql);
				if(empty($res)) {
					response(401,"bad request",NULL);
				}
				else {
					response(200,"User is create",$res);
				}
      } catch (Exception $e) {
          //die('Error : ' . $e->getMessage());
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
?>
