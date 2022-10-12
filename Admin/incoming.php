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
    $url1=$_SERVER['REQUEST_URI'];
    
?>
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
            Incoming Transaction</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Incoming Transaction</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form2" action="" method="post" class="form-horizontal"> 
            <div class="control-group">
              <label class="control-label" id="itemname" >Item Name :</label>
              <div class="controls">
                                            <select name="iname" id="itemname"  onchange="select_item(this.value);select_unit(this.value)"required>
                                            <option value="">select</option>
                                            <?php while($row1= mysqli_fetch_array($result1)):;?>
                                            <option>  <?php  echo $row1[1]?></option>\
                                            <?php endwhile?>
                                            </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Item Code</label>
              <div class="controls">
               <select name="code" id="code">
                   <option>select</option>
               </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tranaction type :</label>
              <div class="controls">
                <select name="type" id="">
            
                   <option> Incoming</option>
                   
               
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Quantity</label>
              <div class="controls">
                <input type="text"   class="span11" placeholder="Enter the amount" name="quantity" id="qty" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit</label>
              <div class="controls">
               <select name="unit" id="unit">
                   <option>select</option>
               </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Each Price</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="1000.00" name="eprice" id="price" onkeyup="genarate_total(this.value)"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Total Value</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="1000.00" name="value" id="gamount" />
              </div>
            </div>
            
            
            <div class="control-group">
              <label class="control-label">Date</label>
              <div class="controls">
                <input type="date"  class="span4" placeholder="something to remeber" name="date" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Note</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="something to remeber" name="note" />
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
<script type="text/javascript">
  function select_item(itemname) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("code").innerHTML=this.responseText;
        
        return;
      }
    };
    xmlhttp.open("GET","forajax/load_items_using_company.php?q=" +itemname, true);
    xmlhttp.send(); 
    
  }
  function select_unit(itemcode) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
       
        document.getElementById("unit").innerHTML=this.responseText;
        return;
      }
    };
    xmlhttp.open("GET","forajax/load_unit.php?q=" +itemcode, true);
    xmlhttp.send(); 
    
  }
  function genarate_total(price){
      document.getElementById("gamount").value=eval(document.getElementById("qty").value)*eval(document.getElementById("price").value);
  }
</script>

      <?php
if(isset($_POST["submit1"]))
{
 

    $count=0;
    
    $fname=$_POST['iname']??"";
    $lname=$_POST['type']??"";
    $upswrd=$_POST['quantity'];
    $uname=$_POST['unit'];
    $role=$_POST['note'];
    $grand=$_POST['value'];
    $eprice=$_POST['eprice'];
    
    $dob = date('Y-m-d', strtotime($_POST['date'])); 
   
    
    mysqli_query($link,"INSERT INTO all_transaction(t_date,item_name,quantity,unit,trans_type,per_value,grand_total,note)values('$dob','$fname','$upswrd','$uname','$lname','$eprice','$grand','$role')");

    
    ?>
       <script type ="text/javascript">
        alert("Transaction Done !!!");
        window.location="transactionhistory.php";
        </script>  
    <?php



}
?>
<?php
if(isset($_POST["submit1"]))
{
  $coded=$_POST['code']??"";
  $fname=$_POST['iname']??"";
  $quan=$_POST['quantity'];
  $uname=$_POST['unit'];
  $eprice=$_POST['eprice'];

 

  $count=0;
  $result=mysqli_query($link,"SELECT * FROM `stock` WHERE Product_name='$_POST[iname]' ");
  $count=mysqli_num_rows($result);
  
  if($count==0)
  {
    mysqli_query($link,"INSERT INTO stock(Item_code,Product_name,Quantity,Unit,each_value)values('$coded','$fname','$quan','$uname','$eprice')");
    
  }
  else
  {
    mysqli_query($link,"UPDATE `stock` SET Quantity='$_POST[quantity]'+Quantity  WHERE Product_name='$_POST[iname]'");
    mysqli_query($link,"UPDATE `stock` SET each_value='$_POST[eprice]'  WHERE Product_name='$_POST[iname]'");
  
  }

}
?>













































<?php
include "footer.php";
?>
