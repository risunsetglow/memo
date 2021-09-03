<?php
require_once 'header.php';
?>

<main>
<form action="input_do.php" method="POST">
  <textarea name="memo" cols="50" rows="10" placeholder="ここにメモしてください!"></textarea>
  <br>
  <button class="button" type="submit">保存する</button>
</form>
</main>

<?php
require_once 'footer.php';