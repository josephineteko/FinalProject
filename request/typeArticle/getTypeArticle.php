<?php
header("Content-Type:application/json");
include_once '../db_config.php';

getListArticle();

function getListArticle() {
  try {
        // connection to the database.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD, $pdo_options);
        $sql = "SELECT * FROM type_article ";

        $res = $bdd->query($sql);
        $output = $res->fetchAll(PDO::FETCH_OBJ);
        if(empty($output))
        {
        	response(200,"List is empty",NULL);
        }
        else
        {
        	response(200,"Success",$output);
        }

    } catch (Exception $e) {
        response(401,"bad request",NULL);
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
