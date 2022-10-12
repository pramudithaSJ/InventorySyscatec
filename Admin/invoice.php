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
           Genarate Invoice</a></div>
    </div>
    <!--End-breadcrumbs-->
    <style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
        <div class="ser">
        <form action="" method="GET"> 
     <div class="col-md-1" style="padding:1px;margin: 10px;">
        <input type="text" name="search" class='form-control' placeholder="Search By Name/Date/Type" value=<?php echo @$_GET['search']; ?> > 
     </div>
     <div class="col-md-6 text-left">
      <button class="btn" style="background-color:green;font-size:15px; color:white;margin-left: 35%;"><i class="icon-search"></i> Search</button>
     </div>
   </form>
        </div>        
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" />
								</td>

								<td>
                                    
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
					<?php 

						$conn = new mysqli('localhost', 'root', '', 'php_ims');
						if(isset($_GET['search'])){
						$searchKey = $_GET['search'];
						$sql = "SELECT * FROM  invoice WHERE I_id  LIKE '%$searchKey%'";
						
						}else
						$sql = "SELECT * FROM invoice ORDER BY I_date DESC ";
						$result = $conn->query($sql);
						?>

						<table>
                        <th  style="font-size:15px; color:black;padding-bottom: 0px;margin-bottom:0;">Date</th>
                        
                            <td>
                            <?php while( $row = $result->fetch_object() ): ?>
							<tr>
								<td style="font-size:15px; color:black;padding-top:0px;margin-bottom:0;"><?php echo $row-> 	I_date  ?></td>
								</tr>	
							<?php endwhile; ?>
								
                        	</td>
     
						</table>
					</td>
				</tr>
				<?php 

$conn = new mysqli('localhost', 'root', '', 'php_ims');
if(isset($_GET['search'])){
$searchKey = $_GET['search'];
$sql = "SELECT * FROM  invoice WHERE I_id  LIKE '%$searchKey%'";

}else
$sql = "SELECT * FROM invoice ORDER BY I_date DESC ";
$result = $conn->query($sql);
?>



				<div class="tyable" style=" visibility: ;">


<table class="table table-bordered">
  <tr>
                  <th style="font-size:15px; color:black;padding-bottom: 10px;">Item Name</th>
                  <th style="font-size:15px; color:black;padding-bottom: 10px;width: 100px;">Quantity</th>
                  <th style="font-size:15px; color:black;padding-bottom: 10px; ">Unit</th>
                  
  </tr>
  <?php while( $row = $result->fetch_object() ): ?>
  <tr>
     <td><?php echo $row-> 	iname  ?></td>
	 <td><?php echo $row-> iquntity  ?></td>
	 <td><?php echo $row-> 	 	unit  ?></td>
     
  </tr>
  <?php endwhile; ?>
</table>


        <div class="container">
   <div class="row print-container">
   <div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
   <div class="row">

   <?php 

     $conn = new mysqli('localhost', 'root', '', 'php_ims');
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM  invoice WHERE I_id  LIKE '%$searchKey%'";
        
     }else
     $sql = "SELECT * FROM invoice ORDER BY I_date DESC ";
     $result = $conn->query($sql);
   ?>
  
     
   

</body>
























<?php
include "footer.php";
?>








