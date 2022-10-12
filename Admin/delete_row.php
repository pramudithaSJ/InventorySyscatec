<?php
session_start();
if(!isset($_SESSION["admin"])){
  ?>
  <script type="text/javascript">
window.location="index.php";
</script>
<?php
}
?>
<?php
Include "connection.php";

$item_code=$_GET["item_code"];

mysqli_query($link,"DELETE FROM items WHERE item_code=$item_code") or die(mysqli_error($link));

?>
<script type="text/javascript">
window.location="addrow.php";
</script>