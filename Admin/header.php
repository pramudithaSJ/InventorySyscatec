<!DOCTYPE html>
<html lang="en">
<head>
    <title>SyscaTec</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link rel="stylesheet" href="css/sidebar.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h3 style="color: white;position: absolute">
        <a href="dashboardadmin.php" style="color:white; margin-left: 30px; margin-right: 30 px; margin-top:100px; padding-right: 10px;">SyscaTec IMS </a>
    </h3>
</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">Welcome Admin</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                
                <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div class="sidebar" id="sidebar">
    <ul>
        <li class="sidebar">
            <a href="Dashboardadmin.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
        </li>
        <li class="submenu"><a href="#"><i class="icon icon-user"></i> <span> Users </span> </a>
            <ul>
                <li><a href="userAdd.php"><i class="icon icon-plus"></i>  Add new user</a></li>
                <li><a href="usersList.php"><i class="icon icon-list"></i> List users</a></li>
               
            </ul>   
        </li>
        <li class="submenu"><a href="#"><i class="icon icon-suitcase"></i> <span> Customers </span> </a>
            <ul>
                <li><a href="addnewcustomer.php"><i class="icon icon-plus"></i>  Add customer</a></li>
                <li><a href="customerlist.php"><i class="icon icon-list"></i>Customer List</a></li>
                
            </ul>   
        </li>

        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span> Items </span> </a>
            <ul>
                
                <li><a href="addrow.php"><i class="icon icon-plus"></i>Add Single Item</a></li>
                <li><a href="addcomposite.php"><i class="icon icon-plus"></i>Add Composite Item</a></li>
            </ul>   
        </li>
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Stock</span> </a>
                <ul>
                    <li><a href="itemlist.php"><i class="icon icon-plus"></i>Row material</a></li>
                    <li><a href="incoming.php"><i class="icon icon-plus"></i>Products</a></li>
                </ul> 
        </li>
        
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Transaction</span> </a>
            <ul>
                <li><a href="transactionhistory.php"><i class="icon icon-plus"></i>Transaction History</a></li>
                <li><a href="incoming.php"><i class="icon icon-plus"></i>Incoming Transaction</a></li>
                <li><a href="addcomposite.php"><i class="icon icon-plus"></i>Production</a></li>
                <li><a href="sales.php"><i class="icon icon-plus"></i>Outgoing Transaction</a></li>
                <li><a href="damaged.php"><i class="icon icon-plus"></i>Damaged</a></li>
            </ul>   
        </li>
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Genarate</span> </a>
                <ul>
                    <li><a href="invoice.php"><i class="icon icon-plus"></i>Invoices</a></li>
                    <li><a href="incoming.php"><i class="icon icon-plus"></i>Incoming Transaction</a></li>
                </ul> 
        </li>
    </ul>
</div>
<!--sidebar-menu-->
<div class="logs"id="search">

        <a href="logout.php" style="color:white"><i class="icon icon-share-alt"></i><span>LogOut</span></a>

</div>

