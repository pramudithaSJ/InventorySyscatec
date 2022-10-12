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
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add Row Metirial</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Composite Item </h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form2" action="" method="post" class="form-horizontal"> 
            <div class="control-group">
              <label class="control-label">Product Code</label>
              <div class="controls">
                <input id="comp_code_txt" type="text" class="span11" placeholder="10500" name="itemcode"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product  Name :</label>
              <div class="controls">
                <input id="comp_name_txt" type="text" class="span11" placeholder="enter the name" name="productname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit</label>
              <div class="controls">
               <select name="unit" id="comp_unit_txt">
                   <option> kg</option>
                   <option> g</option>
                   <option> pcs</option>
               </select>
              </div>
            </div>
    <center>
            <div class="card-header">
              <div style="margin-left:-250px;">
                        <center><h4 style=" margin-left: 13%;"> Used Items </h4></center>
                          
                        </div>     
                    </div>
                    <div class="card-body">
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for=""> Item Name</label>
                                            <select name="iname" id="items_dropdown">
                                            <?php while($row1= mysqli_fetch_array($result1)):;?>
                                            <option>  <?php  echo $row1[0] . ":" . $row1[1]?></option>\
                                            <?php endwhile?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Amount</label>
                                            <input type="text" id="quantity_txt" name="amount[]" class="form-control" required placeholder="Enter the amount">
                                        </div>
                                    </div>
                                    
                                    <div style="padding-bottom:50px;padding-top:50px;">
                                       
                                        <button id="add_btn" type="button" class="btn btn-primary" onClick="addItem()">Add Item</button>
</div>
                                </div>
                            </div>
                    <div class="paste-new-forms"></div>
</form>
</center>
<div>

<table id="items_table" class="table">
  <thead>
    <tr>
      <th scope="col">Item Code</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>
<div/>
<center>
<div style="padding-bottom:50px;padding-top:50px;padding-right:5%;display-position:center;">
<button id="add_comp_btn" type="button" class="btn btn-primary" onClick="addComp()">Add Composite Item</button>
</div> 
</center>            
<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
var counter = 0;

function addItem() {
    var tbodyRef = document.getElementById('items_table').getElementsByTagName('tbody')[0];

// Insert a row at the end of table
var newRow = tbodyRef.insertRow();

// Insert a cell at the end of the row
var itemCodeCell = newRow.insertCell();
var itemNameCell = newRow.insertCell();
var qtyCell = newRow.insertCell();


var e = document.getElementById('items_dropdown');
var item = e.options[e.selectedIndex].value;
var itemParts = item.split(":");
var codeTest = document.createTextNode(itemParts[0]);
itemCodeCell.appendChild(codeTest);

var nameText = document.createTextNode(itemParts[1]);
itemNameCell.appendChild(nameText);

var qty = document.getElementById('quantity_txt').value;
var qtyText = document.createTextNode(qty);
qtyCell.appendChild(qtyText);

// Append a text node to the cell
}

function addComp(){

    var myRows = [];
var $headers = $("th");
var $rows = $("tbody tr").each(function(index) {
  $cells = $(this).find("td");
  myRows[index] = {};
  $cells.each(function(cellIndex) {
    myRows[index][$($headers[cellIndex]).html()] = $(this).html();
  });    
});

// // Let's put this in the object like you want and convert to JSON (Note: jQuery will also do this for you on the Ajax request)
var compositeItem = {};
compositeItem.code = $("#comp_code_txt").val();
compositeItem.name = $("#comp_name_txt").val();
compositeItem.unit = $("#comp_unit_txt").val();
compositeItem.items = myRows;
// alert("fsdfdsf");​
var dataSring = JSON.stringify(compositeItem)

    // Fire off the request to /form.php
    request = $.ajax({
        url: "addCompDb.php",
        type: "post",
        data: {data:dataSring}
        
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        alert(response);
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
}


        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click','.add-more-form', function () {
                $('.paste-new-forms').append('<form action="code.php" method="POST"><div class="main-form mt-3 border-bottom"style="margin-left:50px;">\
                                <div class="row">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Item Name</label>\
                                            <select name="iname">\
                                            <?php while($row1= mysqli_fetch_array($result1)):;?>
                                            <option>  <?php  echo $row1[1]?></option>\
                                            <?php endwhile?>
                                            </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Amount</label>\
                                            <input type="text" name="amount" class="form-control" required placeholder="Enter the amount">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">unit</label>\
                                            <select name="unit" >\
                                            <option>Kg</option>\
                                            <option>g</option>\
                                            <option>Pcs</option>\
                                            </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger"style="margin-bottom:50px;">Remove</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div> <button type="submit" name="save_multiple_data" class="btn btn-primary">Save Product</button>\
                            </form>');
            });

        });
    </script>



<?php
include "footer.php";
?>