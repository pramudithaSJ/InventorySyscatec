<body>
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
    <div id="content-header" class="menu">
        <div id="breadcrumb"><a href="Dashboardadmin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Transaction History</a></div>
    </div>
    <!--End-breadcrumbs-->
<style>
  @media print{
    /* Hide everything*/
    #header{
      visibility: hidden;
    }
    #footer{
      visibility: hidden;
    }

    .menu{
      visibility: hidden;
    }
    .sidebar{
      visibility: hidden;
    }
    .navbar{
      visibility: hidden;
    }
    .logs{
      visibility: hidden;
    }
    .sea{
      visibility: hidden;
    }
    .searchengine{
      visibility: hidden;
    }
   
    
    .row 
    {
      
      padding-right:100px;
      margin-right -100px;;
      
        visibility:visible;
    }
  }
</style>
    <div class="container">
   <div class="row print-container">
   <div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
   <div class="row">

   <?php 

     $conn = new mysqli('localhost', 'root', '', 'php_ims');
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM all_transaction WHERE trans_type  LIKE '%$searchKey%'OR item_name  LIKE '%$searchKey%' OR t_date  LIKE '%$searchKey%'";
        
     }else
     $sql = "SELECT * FROM all_transaction ORDER BY id DESC";
     $result = $conn->query($sql);
   ?>
  
     
   
<div class="searchengine" style="font-size:15px; color:black;margin-left: 70%;">
   <form action="" method="GET"> 
     <div class="col-md-1" style="padding:1px;margin: 10px;">
        <input type="text" name="search" class='form-control' placeholder="Search By Name/Date/Type" value=<?php echo @$_GET['search']; ?> > 
     </div>
     <div class="col-md-6 text-left">
      <button class="btn" style="background-color:green;font-size:15px; color:white;margin-left: 35%;"><i class="icon-search"></i> Search</button>
     </div>
   </form>
</div>
   <br> 
   <div class="text-center">
     <button class="sea" onclick="window.print()"style="background-color:green;font-size:15px; color:white;margin-left:70%;"><i class="icon-print"></i> Print</button>
   </div>
   <br>
</div>
</body>
<table class="table table-bordered">
  <tr>
                <th  style="font-size:15px; color:black;padding-bottom: 25px;">Date</th>
                  <th style="font-size:15px; color:black;padding-bottom: 25px;">Item Name</th>
                  <th style="font-size:15px; color:black;padding-bottom: 25px;">Quantity</th>
                  <th style="font-size:15px; color:black;padding-bottom: 25px;">Unit</th>
                  <th style="font-size:15px; color:black;padding-bottom: 25px;">Transaction Type</th>
                  <th style="font-size:15px; color:black;padding-bottom: 25px;">Each Value</th>
                  <th style="font-size:15px; color:black;padding-bottom: 25px;">Total Amount</th>
                  <th style="font-size:15px; color:black;padding-bottom: 25px;">Note</th>
  </tr>
  <?php while( $row = $result->fetch_object() ): ?>
  <tr>
     <td><?php echo $row->t_date ?></td>
     <td><?php echo $row->item_name ?></td>
     <td><?php echo $row-> 	quantity  ?></td>
     <td><?php echo $row-> 	unit  ?></td>
     <td><?php echo $row-> trans_type  ?></td>
     <td><?php echo $row->  per_value   ?></td>
     <td><?php echo $row-> grand_total   ?></td>
     <td><?php echo $row-> note  ?></td>
  </tr>
  <?php endwhile; ?>
</table>
</div>
</div>
</div>

<?php
include "footer.php";
?>
