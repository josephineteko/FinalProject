<?php
header("Content-Type:application/json");

if(!empty($_POST['id_type']) && !empty($_POST['title'])
	&& !empty($_POST['content']) && !empty($_POST['id_user'])
	&& $_FILES['path']['name'] != '')
{
	$id_user = $_POST['id_user'];
	$id_type = $_POST['id_type'];
  $title = $_POST['title'];
	$content = $_POST['content'];
	$path = $_FILES['path']['name'];

	try {
				// connection to the database.
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO('mysql:host=localhost;dbname=final_project', 'root', 'root', $pdo_options);
				$id_img = uploadFile($path, $bdd);
				if ($id_img != NULL) {
					createArticle($id_type, $title, $content, $id_user, $id_img, $bdd);
				}
		} catch (Exception $e) {
			die('Error : ' . $e->getMessage());
			response(402,"Error Server",NULL);
		}

}
else
{
	response(400,"Invalid Request",NULL);
}

function uploadFile($path, $bdd) {
	  	if ($path != '')
	  	{
	    	$upload_directory = "img/";
	    	$targetPath = time().$path;
	    	if (!is_dir($upload_directory)){
	      	mkdir($upload_directory, 0755, true);
	    	}
	    	if (move_uploaded_file($_FILES['path']['tmp_name'], $upload_directory.$targetPath)) {
			  	$sql = "INSERT INTO image (name, path_img) VALUES ('$path', '$targetPath')";
					$res = $bdd->query($sql);
					if(empty($res)) {
						response(401,"bad request",NULL);
						return NULL;
					}
					else {
						$id_img = $bdd->lastInsertId();
						return $id_img;
					}
	    	}
				else {
					response(405,"Invalid Image",NULL);
				}
	  	}
	return NULL;
}

function createArticle($id_type, $title, $content, $id_user, $id_img, $bdd) {
				$date = new DateTime();
				$newDate = $date->format('Y-m-d H:i:s');
        $sql = "INSERT INTO article (id_type, title, content, id_user, id_img, created_date, last_modification) ".
											"VALUES ('$id_type', '$title', '$content', '$id_user', '$id_img', '$newDate', '$newDate')";

				$res = $bdd->query($sql);
				if(empty($res)) {
					response(401,"bad request",NULL);
				}
				else {
					response(200,"Article is post",$res);
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
