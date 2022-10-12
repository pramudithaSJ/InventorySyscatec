<?php
include "connection.php";
$inamed=$_GET["q"];

$res=mysqli_query($link,"SELECT *FROM items WHERE item_name ='$inamed'");

?>
 <select name="unit" id="unit"></select>
 <?php

 while($row=mysqli_fetch_array($res))
 {
     echo"<option>";
    echo $row["unit"];
     echo"</option>";
 }
 echo"</select>";
 ?>