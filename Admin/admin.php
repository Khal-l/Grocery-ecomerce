<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../Signup/login.php");
    exit;
}
if($_SESSION["user_type"]!==1){
    header("location: error.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin.css" />
    <script src="admin.js" type="text/javascript"></script>
</head>

<body>

    <div class="container" style="padding:5px">
        <div class="container2">
            <div class="menu">
                
                <li><a href="../index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a onclick="btnclick('addProduct.php')"><i class="fa fa-plus"></i> Add Product</a></li>
                <li><a onclick="btnclick('showProduct.php')"><i class="fa fa-light fa-table"></i> Show Products</a></li>
                <li><a onclick="btnclick('removeProduct.php')"><i class="fa fa-minus"></i> Remove Product</a></li>
                <li><a href="../Signup/welcome.php"><i class="fa fa-user"></i> Profile</a></li>
                <div class="line"></div>
            </div>
        </div>
    </div>
    <div class="container" id="function">
        <?php include 'addProduct.php';?> 
    </div>
</body>

</html>