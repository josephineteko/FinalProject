<?php
$mysqli = new mysqli("localhost", "root", "password", "final_project");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else
	echo "Connexion success 1";
echo $mysqli->host_info . "\n";
?>
