<?php
require_once 'header.php';
require_once 'db_connect.php';

$id = $_POST['id'];
$sql = 'UPDATE records SET memo=? WHERE id=?';
$statement = $pdo->prepare($sql);
$statement->bindParam(1,$_POST['memo'],PDO::PARAM_STR);
$statement->bindParam(2,$id,PDO::PARAM_INT);
$statement->execute(); 

?>

<div class="center">
<p>修正しました!</p>
<p><a href="edit.php?id=<?= $id ?>" class="button">メモに戻る</a></p>
</div>



