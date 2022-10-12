<?php
include "../connection.php";
?>
<?php
$fname = $_POST['firstname'] ?? "";
$lname = $_POST['lastname'] ?? "";
$uname = $_POST['username'];
$upswrd = $_POST['upassword'];
$role = $_POST['role'];

$sql = "INSERT INTO user_registration(id,firstname,lastname,username,upassword,urole,ustatus)values(NULL,'$fname','$lname','$uname','$upswrd','$role','active')";

if (mysqli_query($link, $sql)) {
  echo json_encode(array(
    'success' => true
));
} else {

  echo json_encode(array(
    'success' => false,
    'reason'  => mysqli_error($link),
));
}
?>