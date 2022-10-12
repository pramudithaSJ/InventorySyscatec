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
            Add Row Metirial</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Row Metirial</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form2" action="" method="post" class="form-horizontal"> 
            <div class="control-group">
              <label class="control-label">Item Code</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="10500" name="itemcode"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Item Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="enter the name" name="itemname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit</label>
              <div class="controls">
               <select name="unit">
                   <option> kg</option>
                   <option> g</option>
                   <option> pcs</option>
               </select>
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Note</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="something to remeber" name="note" />
              </div>
            </div>
            
            <div class="alert alert-danger"id="error" style="display:none">
               This item or item code already exist!
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
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Item code</th>
                  <th>Item Name</th>
                  <th>Unit</th>
                  <th>Note</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
              </thead>
             <tbody>
                 <?php

                 $res=mysqli_query($link,"SELECT*FROM items");
                 while($row=mysqli_fetch_array($res)){
                 ?>
                 <tr>
                    <td> <?php echo $row["item_code"];?></td>
                    <td> <?php echo $row["item_name"];?></td>
                    <td> <?php echo $row["unit"];?></td>
                    
                    <td> <?php echo $row["note"];?></td>
                    <td>  <center><a href="edit_row.php?item_code=<?php  echo $row["item_code"];?>" style="color:green">Edit</a></center></td>
                    <td>  <center><a href="delete_row.php?item_code=<?php  echo $row["item_code"];?>"style="color:red">Delete</a></center></td>
                 </tr>
                 <?php
                 }
                 ?>
             </tbody>

            </table>
          </div>
        </div>
</div>
<?php
if(isset($_POST["submit1"])){
 

            $count=0;
            $res=mysqli_query($link,"SELECT * FROM `items` WHERE item_name='$_POST[itemname]'OR item_code='$_POST[itemcode]' ");
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
    $fname=$_POST['itemcode']??"";
    $lname=$_POST['itemname']??"";
    $uname=$_POST['unit'];
    $upswrd=$_POST['quantity'];
    $role=$_POST['note'];
   
    
    mysqli_query($link,"INSERT INTO items(item_code,item_name,unit,quantity,note)values('$fname','$lname','$uname','$upswrd','$role')");
    
    ?>
       <script type ="text/javascript">
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
        alert("item Added success!!!!");
        window.location="addrow.php";
        </script>
       
       
       <?php
}


}
?>




<?php
include "footer.php";
?>
