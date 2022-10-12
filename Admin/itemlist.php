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
            Item List</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Row material stock </h5>
        </div>

<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Item code</th>
                  <th>Item Name</th>
                  <th>Stock On Hand</th>
                  <th>Unit</th>
                  <th>Per Price</th>
                  
                </tr>
              </thead>
             <tbody>
                 <?php

                 $res=mysqli_query($link,"SELECT*FROM stock");
                 while($row=mysqli_fetch_array($res)){
                 ?>
                 <tr>
                    <td> <?php echo $row["Item_code"];?></td>
                    <td> <?php echo $row["Product_name"];?></td>
                    <td style="text-align:right;"> <?php echo $row["Quantity"];?></td>
                    <td> <?php echo $row["Unit"];?></td>
                    <td> <?php echo $row["each_value"];?></td>
                    
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
include "footer.php";
?>