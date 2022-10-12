<?php
include "connection.php";
$inamed=$_GET["q"];

$res=mysqli_query($link,"SELECT * FROM stock  WHERE Product_name ='$inamed'");

?>
 <select name="code" id="code" onchange="select_unit(this.value)">
 <?php

 while($row=mysqli_fetch_array($res))
 {
    echo"<option>";
    echo $row["Quantity"];
     echo"</option>";
 }
 echo"</select>";
 ?>
 