<?php
require_once 'header.php';
?>

<main>
<?php
require_once 'db_connect.php';

if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
  $page = $_REQUEST['page'];
}else{
  $page=1;
}
$start = 5 * ($page - 1);
$memos = $pdo->prepare('SELECT * FROM records ORDER BY id DESC LIMIT ?,5');
$memos->bindParam(1 , $start , PDO::PARAM_INT);
$memos->execute();
?>

<div class="center">
<a href="input.php" class="button">新規メモ</a>
</div>

<table border="1">
<?php while ($memo = $memos->fetch(PDO::FETCH_ASSOC)) { ?>
  <tr>
    <td>
  <p><a href="edit.php?id=<?= $memo['id'] ?>"> <?= mb_substr($memo['memo'] , 0, 50); ?></a></p>
  <div class="flex">
    <div><time><?= $memo['created_at'];?></time></div>
    <div style="margin-right: 10px;">
     <a href="delete.php?id=<?=$memo['id']?>" class="delete"><span class="material-icons">delete</span></a> 
    </div>
  </div>
  
<?php } ?>
</td>
  </tr>
</table>

<p>
  <?php if($page >= 2): ?>
  <a href="list.php?page=<?= $page - 1 ?>"><?= $page-1 ?>ページ目</a>
  <?php endif; ?>
  |
  <?php 
  $counts = $pdo->prepare('SELECT COUNT(*) as cnt FROM records');
  $counts->execute();
  $count = $counts->fetch(PDO::FETCH_ASSOC);
  $max_page = ceil($count['cnt'] / 5);
  if($page < $max_page):
  ?>
  <a href="list.php?page=<?= $page + 1 ?>"><?= $page+1 ?>ページ目</a>
  <?php endif; ?>
</p>

</main>

<?php
require_once 'footer.php';
