<?php
require_once 'header.php';
require_once 'db_connect.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];

$memos = $pdo->prepare('SELECT * FROM records WHERE id=?');
$memos->bindParam(1 , $id , PDO::PARAM_INT);
$memos->execute();
$memo = $memos->fetch();
}
?>

<main>
<form action="edit_do.php" method="POST">
  <input type="hidden" name="id" value="<?=$id?>">
  <textarea name="memo" cols="50" rows="10">
    <?=$memo['memo']?>
  </textarea>
  <br>
  <button type="submit" class="button">保存する</button>
</form>
</main>

<?php
require_once 'footer.php';