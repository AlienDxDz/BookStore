<?php
require("db_connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$sqlkl = "DELETE FROM commentcheck WHERE id = ?";        
    $qkl = $pdo->prepare($sqlkl);

    $responsekl = $qkl->execute(array($_POST['idComment']));  

    header("Location: admin.php");  
}
?>