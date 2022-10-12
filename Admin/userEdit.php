<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
    $firstname="";
    $lastname="";
    $username="";
    $password="";
    $status="";
    $role="";
$res=mysqli_query($link,"SELECT * FROM `user_registration` WHERE id=$id ");
while($row=mysqli_fetch_array($res))
{
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $username=$row["username"];
    $password=$row["upassword"];
    $status=$row["ustatus"];
    $role=$row["urole"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="To Dashboard" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">

<div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
<div class="span12">
<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
  <h5>Edit User Deatils</h5>
</div>
<div class="widget-content nopadding">
  <form name="form2" action="" method="post" class="form-horizontal"> 
    <div class="control-group">
      <label class="control-label">First Name :</label>
      <div class="controls">
        <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo $firstname; ?>"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Last Name :</label>
      <div class="controls">
        <input type="text" class="span11" placeholder="Last name" name="lastname"value="<?php echo $lastname; ?>"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">User Name :</label>
      <div class="controls">
        <input type="text" class="span11" placeholder="User Name" name="username" readonly value="<?php echo $firstname; ?>"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label"> Input Password</label>
      <div class="controls">
        <input type="password"  class="span11" placeholder="Enter Password" name="upassword" required value="<?php echo $firstname; ?>"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label"> Select role</label>
      <div class="controls">
       <select name="role" >
        <option <?php if($role=="admin"){echo"selected";}?>>admin</option>
        <option <?php if($role=="user"){echo"selected";}?> >user</option>

       </select> 
      </div>
    </div>
    <div class="control-group">
      <label class="control-label"> Role Status</label>
      <div class="controls">
       <select name="status" >
        <option <?php if($status=="active"){echo"selected";}?> >Active</option>
        <option <?php if($status=="Inactive"){echo"selected";}?> >Inactive</option>

       </select>
      </div>
    </div>
    
        
    <center>
        <div class="form-actions">
      <button type="submit" name="submit1" class="btn btn-success">Update</button>
    </div>
    </center>
    <div class="alert alert-success"id="success" style="display:none">
         Record Updated Successfully!
        </div>
    
  </form>
</div>
</div>

</div>


<?php
 if(isset($_POST["submit1"]))
 {
    mysqli_query($link,"UPDATE `user_registration` SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',upassword='$_POST[upassword]',urole='$_POST[role]',ustatus='$_POST[status]' WHERE id=$id")or die(mysqli_error($link));
?>
<script>
         alert("User updated successfully");
        window.location="userlist.php";
        </script>
        <?php
 }

?>

<!--end-main-container-part-->

<?php
include "footer.php"
?> 