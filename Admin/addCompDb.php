<?php
include "connection.php";
?>
<?php
$composite=$_POST['data'];
$comJson = json_decode($composite);
$compName=$comJson->name;
$compCode=$comJson->code;
$compUnit=$comJson->unit;

echo "Composite Product" . $compName . $compCode . $compUnit;

$sql = "INSERT INTO items (item_code,item_name, unit) VALUES ('$compCode' , '$compName', '$compUnit')";

if (mysqli_query($link, $sql)) {
  
  echo "New product added successfully";
} else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

  $itemsArray = $comJson->items;
  foreach($itemsArray as $value) {
  $itemCode = $value->{'Item Code'};
  $itemQty = $value->Quantity;

  $sqlProduct = "INSERT INTO composite_item (composite_item_code,raw_item_code, item_quantity) VALUES ('$compCode' , '$itemCode', '$itemQty')";
  if (mysqli_query($link, $sqlProduct)) {
  
    echo "Composition with " . $itemCode . " added successfully <br>" ;
  } else 
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
}
?>