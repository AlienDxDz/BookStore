<?php
require("db_connection.php");
session_start();
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $sasas = $pdo->query("SELECT * FROM commentcheck WHERE id = ".$_POST['idComment'].";");
          $rasas = $sasas->fetch(PDO::FETCH_ASSOC);

          $sqlqw = "INSERT INTO comment (client_id, book_id, texts, dates) VALUES (:client_id, :book_id, :texts, :dates);";
          $qeqw = $pdo->prepare($sqlqw);
          $qeqw->execute(array(
            ':client_id' => $rasas['client_id'],
            ':book_id' => $rasas['book_id'],
            ':texts' => $rasas['texts'],
            ':dates' => $rasas['dates']
          ));

          $sqlkl = "DELETE FROM commentcheck WHERE id = ?";        
          $qkl = $pdo->prepare($sqlkl);

          $responsekl = $qkl->execute(array($_POST['idComment']));  

          header("Location: admin.php");
          
        
      }
?>