<?php
header("Content-Type:application/json");
include_once '../db_config.php';

if (isset($_GET['id_article'])) {
  $id_article = $_GET['id_article'];
  getListComment($id_article);
}
else {
  response(400,"Invalid Request",NULL);
}

function getListComment($id_article) {
  try {
        // connection to the database.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD, $pdo_options);
        $sql = "SELECT c.content, u.username FROM comment c INNER JOIN user u ON c.id_user = u.id  WHERE id_article=".$id_article;
        $res = $bdd->query($sql);
        $output = $res->fetchAll(PDO::FETCH_OBJ);
        if(empty($output))
        {
        	response(200,"List of comment is empty",NULL);
        }
        else
        {
        	response(200,"Success",$output);
        }

    } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
        response(401,"bad request", $sql);
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
