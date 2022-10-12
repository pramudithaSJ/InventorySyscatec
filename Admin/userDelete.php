<?php

include "../user/connection.php";


$id=$_GET["id"];
$data=mysqli_query($link,"DELETE FROM user_registration WHERE id=$id");
if ($data)
{
    ?>
    <script>
    
    alert("User deleted success!!!!");
    window.location="userlist.php";
    </script>
    
    <?php
    

}
else{
    echo"delete unsuccessfull!!";
}
?>