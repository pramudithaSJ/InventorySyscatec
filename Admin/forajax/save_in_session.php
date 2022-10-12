<?php
session_start();
include "connection.php";
$product_name=$_GET["name"];
$p_quantity=$_GET["qty"];
$each_price=$_GET["price"];
$net_amount=$_GET["amount"];

if(isset($_SESSION['cart']))
{
    $max=sizeof($_SESSION['cart']);
    $check_available=0;
    $check_available=check_duplicate_product($product_name);
    $available_qty=0;
    $check_the_qty=0;

    if($check_available==0)
    {
        $available_qty=$check_qty($product_name,$link);
        if($available_qty>=$qty)
        {
            $b=array("product_name"=>$product_name,"qty"=>$p_quantity,"each_price"=>$each_price,"net_amount"=>$net_amount);
            array_push($_SESSION['cart'],$b);
        }
        else{
            echo"not enough";
        }
    }
    else{
        $av_qty=0;
        $exis_qty=0;
        $exis_qty=check_the_qty($product_name,$link)
        $exis_qty=$exis_qty+$qty;
        $av_qty=$check_qty($product_name,$link);
        if(
            $check_product_no_session=check_product_no_session($product_name);
            $b=array("product_name"=>$product_name,"qty"=>$exis_qty,"each_price"=>$each_price,"net_amount"=>$net_amount);
            $_SESSION['cart'][$check_product_no_session]=$b;
        )
    }
}
else{
    $available_qty(($product_name,$link);
    if($available_qty>=$qty)
    {
            $_SESSION['cart']=array(array("product_name"=>$product_name,"qty"=>$p_quantity,"each_price"=>$each_price,"net_amount"=>$net_amount));
    }
    else{
        echo "entered quntity is not available";
    }

}

function check_qty($product_name,$link)
{
    $product_qty=0;
    $res=mysqli_query($link,"SELECT * FROM stock WHERE Product_name = '$product_name' " );
    while($row=mysqli_fetch_array($res))
    {
        $product_qty=$row["Quantity "];
    }
    return $product_qty;
}

function check_duplicate_product($product_name)
{
        $found=0;
        $max=sizeof($_SESSION['cart']);
        for($i=0;$i<$max;$i++)
        {
            if(isset($_SESSION['cart'][$i]))
            {
                $product_name_session="";

                foreach ($_SESSION['cart'][$i] as $key => $val)
                {
                    if($key=="$product_name")
                    {
                     $product_name_session=$val;
                    }
                }
            if($product_name==$product_name)
            {
                $found=$found+1; 
            }
            
            }
        }
return $found;

}
function check_the_qty($product_name)
{
    $qty_found=0;
    $qty_session=0;
    $max=sizeof($_SESSION['cart']);
    for($i=0;$i<$max;$i++)
    {
        $product_name_session="";

        if(isset($_SESSION['cart'][$i]))
        {
            
            foreach ($_SESSION['cart'][$i] as $key => $val)
            {
                if($key=="$product_name")
                {
                 $product_name_session=$val;
                }
                else if($key=="qty")
                {
                    $qty_session=$val;
                }
            }
        if($product_name==$product_name)
        {
            $qty_found=$qty_session; 
        }
        
        }
    }
return $qty_session; 
}

function check_product_no_session($product_name)
{
   $recorcno=0;
    $max=sizeof($_SESSION['cart']);
    for($i=0;$i<$max;$i++)
    {
        if(isset($_SESSION['cart'][$i]))
        {
            $product_name_session="";

            foreach ($_SESSION['cart'][$i] as $key => $val)
            {
                if($key=="$product_name")
                {
                 $product_name_session=$val;
                }
            }
        if($product_name==$product_name)
        {
            $recorcno=$i;
        }
        
        }
    }
return $recorcno;
}
?>