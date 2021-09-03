<?php
require_once 'header.php';
?>

<main>

<?php
require_once 'db_connect.php';

$sql = 'INSERT INTO records SET memo=? , created_at=NOW()';
$statement = $pdo->prepare($sql);
$statement->bindParam(1,$_POST['memo']);
$statement->execute();  


?>

</main>

<?php
header('Location: http://localhost:8888/memo/list.php');
