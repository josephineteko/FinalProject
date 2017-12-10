<?php
header("Content-Type:application/json");
include_once '../db_config.php';

if(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = $_POST['username'];
  $password = $_POST['password'];

	if (strlen($password) > 8) {
		createUser($username, $password);
	} else {
		response(403,"Password too short",NULL);
	}

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

				if (userExist($username, $bdd) == false) {
							$date = new DateTime();
							$newDate = $date->format('Y-m-d H:i:s');
        			$crypt_password = md5($password);
        			$sql = "INSERT INTO user (username, password, last_auth) VALUES ('".$username."', '".$crypt_password."', '".$newDate."')";

        			$res = $bdd->query($sql);

							if(empty($res)) {
								response(401,"Bad request",NULL);
							}
							else {
								response(200,"User is create",$bdd->lastInsertId());
							}
					}
      } catch (Exception $e) {
				//die('Error : ' . $e->getMessage());
            	response(402,"Error Server",NULL);
      }
}

function userExist($username, $bdd) {
        $sql = "SELECT * FROM user WHERE username='".$username."'";

        $res = $bdd->query($sql);
				$output = $res->fetchAll(PDO::FETCH_OBJ);
				if(empty($res)) {
					response(401,"Bad request",NULL);
					return true;
				}
				elseif (empty($output)) {
					return false;
				}
				else {
					response(405,"Username already used", NULL);
					return true;
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
