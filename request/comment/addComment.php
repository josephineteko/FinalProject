<?php
header("Content-Type:application/json");
include_once '../db_config.php';

if(!empty($_POST['id_user']) && !empty($_POST['id_article'])
  && !empty($_POST['content']))
{
	$id_user = $_POST['id_user'];
  $id_article = $_POST['id_article'];
  $content = $_POST['content'];

	createComment($id_user, $id_article, $content);
} else {
	response(400,"Invalid Request",NULL);
}

function createComment($id_user, $id_article, $content) {
  try {
        // connection to the database.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD, $pdo_options);

        $date = new DateTime();
        $newDate = $date->format('Y-m-d H:i:s');
        $sql = "INSERT INTO comment (id_user, id_article, content, created_date, last_modification)".
                " VALUES ('".$id_user."', '".$id_article."', '".$content."', '".$newDate."', '".$newDate."')";

        $res = $bdd->query($sql);
				if(empty($res)) {
					response(401,"Bad Request",NULL);
				} else {
					response(200,"Comment is create",$res);
				}
      } catch (Exception $e) {
        response(402,"Error Server",NULL);
          //die('Error : ' . $e->getMessage());
      }
  return $output;
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
