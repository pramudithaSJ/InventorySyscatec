<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script type="text/javascript">
    window.location = "index.php";
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
  <script>
    function myFunction() {
      if (confirm("Are you sure you want to add the user?")) {
        // Fire off the request to /form.php
        var userData = $("#user_form").serialize();
        // alert(userData);
        request = $.ajax({
          url: "forajax/user_add_be.php",
          type: "post",
          data: userData
        });

        // Callback handler that will be called on success
        request.done(function(response, textStatus, jqXHR) {
          var responseJson = JSON.parse(response);
          // alert("Respose received: " + responseJson.success + "-" + responseJson.reason);
          if (responseJson.success) {
            alert("User added successfully!");
            window.location.href = "usersList.php";
          } else {
            alert("Error while adding user. Error details: " + responseJson.reason);
          }
        });

        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
          // Log the error to the console
          alert(
            "Error occurred while adding user: " +
            errorThrown, errorThrown
          );
        });
      }
    }
  </script>
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"><a href="Dashboardadmin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        Add New User</a></div>
  </div>
  <!--End-breadcrumbs-->

  <!--Action boxes-->
  <div class="container-fluid">

    <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Add new user</h5>
          </div>
          <div class="widget-content nopadding">
            <form name="form2" id="user_form" action="" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">First Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="First name" name="firstname" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Last name" name="lastname" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">User Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="User Name" name="username" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Input Password</label>
                <div class="controls">
                  <input type="password" class="span11" placeholder="Enter Password" name="upassword" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Select role</label>
                <div class="controls">
                  <select name="role">
                    <option>admin</option>
                    <option>user</option>

                  </select>
                </div>
              </div>
              <div class="alert alert-danger" id="error" style="display:none">
                This username already exist!
              </div>

              <center>
                <div class="form-actions">
                  <button type="button" name="submit1" class="btn btn-success" onClick="myFunction()">Save</button>
                </div>
              </center>
              <div class="alert alert-success" id="success" style="display:none">
                Record Inserted Successfully!
              </div>

            </form>
          </div>
        </div>

      </div>
      <?php
      include "footer.php";
      ?>