
<?php

include "../user/connection.php";


$id=$_GET["id"];
$data=mysqli_query($link,"DELETE FROM customer WHERE id=$id");
if ($data)
{
    ?>
    <script>
    
    alert("User deleted success!!!!");
    window.location="addnewcustomer.php";
    </script>
    
    <?php
    

}
else{
    echo"delete unsuccessfull!!";
}

?>
