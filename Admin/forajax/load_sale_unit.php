<?php
include "connection.php";
$inamed=$_GET["q"];

$res=mysqli_query($link,"SELECT *FROM stock WHERE Product_name  ='$inamed'");

?>
 <select name="unit" id="unit"></select>
 <?php

 while($row=mysqli_fetch_array($res))
 {
     echo"<option>";
    echo $row["Unit"];
     echo"</option>";
 }
 echo"</select>";
 ?>