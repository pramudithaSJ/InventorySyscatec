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
include "../user/connection.php";
include "header.php"
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="To Dashboard" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->
    <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
<div class="span12">
<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
  <h5> User Deatils</h5>
</div>
    <!--Action boxes-->
    <div class="widget-content nopadding">
            <table class="table table-bordered table-striped"style="padding: 50px;">
              <thead>
                <tr>
                  <th>firstname</th>
                  <th>lastname</th>
                  <th>username</th>
                  <th>role</th>
                  <th>status</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
              </thead>
             <tbody>
                 <?php

                 $res=mysqli_query($link,"SELECT*FROM user_registration");
                 while($row=mysqli_fetch_array($res)){
                 ?>
                 <tr>
                    <td> <?php echo $row["firstname"];?></td>
                    <td> <?php echo $row["lastname"];?></td>
                    <td> <?php echo $row["username"];?></td>
                    <td> <?php echo $row["urole"];?></td>
                    <td> <?php echo $row["ustatus"];?></td>
                    <td>  <center><a href="userEdit.php?id=<?php  echo $row["id"];?>" style="color:green">Edit</a></center></td>
                    <td>  <center><a href="userDelete.php?id=<?php  echo $row["id"];?>"style="color:red" onclick="confirmAction()">Delete</a></center></td>
                 </tr>
                 <?php
                 }
                 ?>
             </tbody>

            </table>
          </div>
        </div>
</div>
</div>

<!--end-main-container-part-->
<script>
      // The function below will start the confirmation dialog
      function confirmAction() {
        let confirmAction = confirm("Are you sure to execute this action?");
        if (confirmAction) {
          alert("Action successfully executed");
        } else {
          window.location="userlist.php";
        }
      }
    </script>
<?php
include "footer.php"
?>