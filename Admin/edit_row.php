<?php
include "header.php";
include " conncetion.php";
$item_code=$_GET["item_code"];

mysqli_query($link,"SELECT * FROM items WHERE item_code=$item_code") or die(mysqli_error($link));
while($row=mysqli_fetch_array($res))
{
    
}