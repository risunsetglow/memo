<?php
require_once 'header.php';
require_once 'db_connect.php';


if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
  $id = $_GET['id'];
  $sql = 'DELETE FROM records WHERE id=?';
  $statement = $pdo->prepare($sql);
  $statement->bindParam(1,$id,PDO::PARAM_INT);
  $statement->execute();  
}

header('Location: http://localhost:8888/memo/list.php');
?>

