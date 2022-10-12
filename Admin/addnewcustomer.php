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
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="Dashboardadmin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add Customer</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Customer</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form2" action="" method="post" class="form-horizontal"> 
            <div class="control-group">
                
              <label class="control-label">First Name</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="name" name="firstname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="name" name="lastname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="enter the name" name="cname" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label"> Address </label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter the Address " name="address" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact Number</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="something to remeber" name="cnumber" />
              </div>
            </div>
            
            <div class="alert alert-danger"id="error" style="display:none">
               This item already exist!
                </div>
                
            <center>
                <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>
            </center>
            <div class="alert alert-success"id="success" style="display:none">
                 Record Inserted Successfully!
                </div>
            
          </form>
        </div>
      </div>
      
<?php
if(isset($_POST["submit1"])){
 

            $count=0;
            $res=mysqli_query($link,"SELECT * FROM `customer` WHERE firstname='$_POST[firstname]' ");
            $count=mysqli_num_rows($res);

        if($count>0)
    {
       ?>
       <script type ="text/javascript">
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
        </script>
       
       
       <?php
    }
else
{
    $fname=$_POST['firstname']??"";
    $lname=$_POST['lastname']??"";
    $uname=$_POST['cname'];
    $upswrd=$_POST['address'];
    $role=$_POST['cnumber'];
    
    mysqli_query($link,"INSERT INTO customer(id,firstname,lastname,companyname,contact,c_address)values(NULL,'$fname','$lname','$uname','$role',' $upswrd')");
    
    ?>
       <script type ="text/javascript">
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
        alert("customer Added success!!!!");
        window.location="customerlist.php";
      </script>
       
       
       <?php
}


}
?>




<?php
include "footer.php";
?>
