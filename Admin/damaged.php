

<?php
include "header.php";
include "connection.php";
?>

<?php
 $sname ="localhost";
 $uname="root";
 $password="";
 $db_name ="php_ims";
 $connect = mysqli_connect($sname, $uname,  $password, $db_name);

 $query = "SELECT * FROM `items`";
 $result1=mysqli_query($connect,$query);
?>





<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="Dashboardadmin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
           Damaged Item</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Damaged Item</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form2" action="" method="post" class="form-horizontal"> 
            <div class="control-group">
              <label class="control-label">Item Name :</label>
              <div class="controls">
                                            <select name="iname" id="items_dropdown">
                                            <?php while($row1= mysqli_fetch_array($result1)):;?>
                                            <option>  <?php  echo $row1[1]?></option>\
                                            <?php endwhile?>
                                            </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Type :</label>
              <div class="controls">
                <select name="type" id="">
            
                   <option> Damaged </option>
                   
               
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Quantity</label>
              <div class="controls">
                <input type="text"   class="span11" placeholder="Enter the amount" name="quantity" required/>
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
            <div class="control-group">
              <label class="control-label">Date</label>
              <div class="controls">
                <input type="date"  class="span4" placeholder="something to remeber" name="date" />
              </div>
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
if(isset($_POST["submit1"]))
{
 

    $count=0;
    
    $fname=$_POST['iname']??"";
    $lname=$_POST['type']??"";
    $upswrd=$_POST['quantity'];
    $uname=$_POST['unit'];
    $role=$_POST['note'];
    $dob = date('Y-m-d', strtotime($_POST['date'])); 
   
    
    mysqli_query($link,"INSERT INTO all_transaction(t_date,item_name,quantity,unit,trans_type,note)values('$dob','$fname','$upswrd','$uname','$lname','$role')");

    
    ?>
       <script type ="text/javascript">
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
        </script>  
    <?php



}
?>
<?php
if(isset($_POST["submit1"]))
{
  $fname=$_POST['iname']??"";
  $quan=$_POST['quantity'];
  $uname=$_POST['unit'];

 

  $count=0;
  $result=mysqli_query($link,"SELECT * FROM `stock` WHERE Product_name='$_POST[iname]' ");
  $count=mysqli_num_rows($result);
  
  if($count==0)
  {
    mysqli_query($link,"INSERT INTO stock(Product_name,Quantity,Unit)values('$fname','$quan','$uname')");
  }
  else
  {
    mysqli_query($link,"UPDATE `stock` SET Quantity=Quantity-'$_POST[quantity]' WHERE Product_name='$_POST[iname]'");
  
 
}
}
?>













































<?php
include "footer.php";
?>
