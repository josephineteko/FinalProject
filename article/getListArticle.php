<?php
header("Content-Type:application/json");


$res = getListArticle($username, $password);
if(empty($res))
{
	response(200,"List is empty",NULL);
}
else
{
	response(200,"Success",$res);
}

function getListArticle($username, $password) {
  try {
        // connection to the database.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=final_project', 'root', 'password', $pdo_options);

        $crypt_password = md5($password);
        $sql = "SELECT a.id id, a.title title, a.content content, a.last_modification last_modification ".
							", a.id_user id_user, a.id_img id_img, i.path_img path_img, i.name img_name FROM article a ".
							" INNER JOIN image i ON a.id_img = i.id ORDER BY last_modification DESC";

        $res = $bdd->query($sql);
        $output = $res->fetchAll(PDO::FETCH_OBJ);

      } catch (Exception $e) {
        response(401,"bad request",NULL);
        exit();
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
