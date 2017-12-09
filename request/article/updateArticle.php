<?php
  // Execute SQL request on the database.
  if (isset($_POST['id']) && isset($_POST['title'])
  && isset($_POST['content']) && isset($_POST['id_user'])
  && isset($_POST['id_img']) ) {
      $id = $_POST['id'];
      $id_user = $_POST['id_user'];
      $title = $_POST['title'];
    	$content = $_POST['content'];
      $id_img = $_POST['id_img'];
    	$path = $_FILES['path']['name'];

      // connection to the database.
      try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=contact', 'root', 'root', $pdo_options);

        uploadFile($path, $id_img, $bdd);
        updateArticle($title, $content, $id_user, $id, $bdd);

      } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
      }
  } else {
    response(400,"Invalid Request",NULL);
  }



function uploadFile($path, $id_img, $bdd) {
  if ($path != '')
  {
    $upload_directory = "img/";
    $targetPath = time().$path;
    if (!is_dir($upload_directory)){
    	mkdir($upload_directory, 0755, true);
    }
    if (move_uploaded_file($_FILES['path']['tmp_name'], $upload_directory.$targetPath)) {
    	$sql = "UPDATE image SET name='$path', path_img='$targetPath' WHERE id='$id_image'";
    	$res = $bdd->query($sql);
    	if(empty($res)) {
    		response(401,"bad request",NULL);
    	}
    	else {
    		$id_img = $bdd->lastInsertId();
    	}
    }
    else {
      response(405,"Invalid Image",NULL);
    }
  }
}

function updateArticle($title, $content, $id_user, $id, $bdd) {
	$date = new DateTime();
  $newDate = $date->format('Y-m-d H:i:s');

  $sql = "UPDATE article SET title='$title', content='$content', last_modification="'$newDate'" ".
          "WHERE id='$id' AND id_user='$id_user'";
	$res = $bdd->query($sql);
	if(empty($res)) {
		response(401,"bad request",NULL);
	} else {
		response(200,"Article is post",$output);
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
