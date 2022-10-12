<?php
include "header.php";
include "connection.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                    Sale a products</a></div>
        </div>

        <div class="container-fluid">
            <form name="form1" action="" method="post" class="form-horizontal nopadding">
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Sale a Products</h5>
                            </div>

                            <div class="widget-content nopadding">


                                <div class=" span4">
                                    <br>

                                    <div>
                                <label> Company Name</label>
                                <select class="span11" name="company_name" id="company_name"
                                        onchange="select_company(this.value)">
                                    <option>Select</option>
                                    <?php
                                    $res = mysqli_query($link, "SELECT* from  customer ");
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<option>";
                                        echo $row["companyname"];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                                </div>

                                <div class="span3">
                                    <br>

                                    <div>
                                        <label>Bill Type</label>
                                        <select class="span12" name="bill_type">
                                            <option>Cash</option>
                                            <option>Debit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>Date</label>
                                        <input type="text" class="span12" name="date"
                                               value="<?php echo date("Y-m-d") ?>"
                                               readonly>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <!-- new row-->
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">


                        <center><h4>Select A Product</h4></center>


                        <div class="span2">
                            <div>
                                <label>Product Name</label>
                                
                                    <select  class="span11" name="iname" id="itemname"  onchange="select_total(this.value);">
                                    <option>Select</option>
                                    <?php
                                    $res = mysqli_query($link, " SELECT* from  stock ");
                                    while ($row = mysqli_fetch_array($res)) {
                                        
                                        echo "<option>";
                                        echo $row["Product_name"];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="span3">
                            <div>
                                <label>Stock On Hand</label>
                                <select name="code" id="code">
                                    <option> select</option>
                                </select>
                            </div>
                        </div>
                        
                        

                        <div class="span1">
                            <div>
                                <label> Each Price</label>
                                <input type="text" class="span11" name="price" id="price">
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Enter Qty</label>
                                <input type="text" class="span11" name="qty" id="qty" autocomplete="off" onkeyup="genarate_total(this.value)">
                            </div>
                        </div>
                        <div class="span1">
                            <div>
                                <label>Unit</label>
                                <div id="unit">
                                    <select class="span11">
                                        <option>select</option>
                                        <option>g</option>
                                        <option>pcs</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="span3">
                            <div>
                                <label>Total Amount</label>
                                <input type="text" class="span11" name="gamount" id="gamount">
                            </div>
                        </div>


                        
                        <center>
                        <div class="span1">
                            <div>
                                <label>&nbsp</label>
                                <input type="button" class="span11 btn btn-success" value="Add" onclick="add_session();">
                            </div>
                        </div>
                        </center>

                    </div>
                </div>

                <!-- end new row-->


            </form>


            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">
                    <center><h4>Taken Products</h4></center>

                    <table class="table table-bordered">
                        <tr>
                            <th>Product Company</th>
                            <th>Product Name</th>
                            <th>Product Unit</th>
                            <th>Product Size</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                            <th>Total</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <tr>
                            
                            
                        </tr>
                    </table>

                    


                    <br><br><br><br>

                    <center>
                        <input type="submit" value="generate bill" class="btn btn-success">
                    </center>

                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
  function select_total(itemname) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("code").innerHTML=this.responseText;
        
        return;
      }
    };
    xmlhttp.open("GET","forajax/load_stock.php?q=" +itemname, true);
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
    xmlhttp.open("GET","forajax/load_sale_unit.php?q=" +itemcode, true);
    xmlhttp.send(); 
    
  }
  function genarate_total(qty){
      document.getElementById("gamount").value=eval(document.getElementById("qty").value)*eval(document.getElementById("price").value);
  }

  function add_session()
  {
      var product_name=document.getElementById("itemname").value;
      var product_qty=document.getElementById("qty").value;
      var each_price=document.getElementById("price").value;
      var total_amount=document.getElementById("gamount").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
        if(xmlhttp.responseText=="")
        {
            alert("product Added successfully");

        }
        else
        {
            alert("xmlhttp.responseText ");
        }
      }
    };
    xmlhttp.open("GET","forajax/save_in_session.php?name="+product_name+"&qty="+qty+"&price="+price+"&amount="+gamount, true);
    xmlhttp.send(); 
  }

</script>




<?php
include "footer.php";
?>