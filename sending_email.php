<html>
    <head>
            <link rel="stylesheet" href="Signup/login.css" />
    </head>
    
    
<body>
    <div class="container">
        <div class="title">
            
        <?php
                  include_once "connection.php";
    if (isset($_POST['submit2'])) {
        
        $Address = $_POST['address'];
        $City = $_POST['city'];
        $Zip = $_POST['code'];
        

        // insert info to db

        $stmt = $conn->prepare("INSERT INTO `Address`(`Address`, `City`, `Zip`) VALUES (?,?,?)");
        $stmt->bind_param("sss", $Address, $City, $Zip); 

        if (!$stmt->execute())
            die("Error no such address");
    }
?>
<?php 
  
try {
session_start();
require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("moki_productdb", "Producttb");
$result = $db->getData();
$product_id = array_column($_SESSION['cart'], 'product_id');
$message = "<html>You bought:<br>";
while ($row = mysqli_fetch_assoc($result)){
    foreach ($product_id as $id){
        if ($row['id'] == $id){
            $message .= $row['product_name'].": ". $row['product_price'].'$'."<br>";
        }
    }
}
$message .= "</html>";

// Content-Type helps email client to parse file as HTML 
// therefore retaining styles
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail('itanimokhtar@gmail.com', 'Receipt', $message, $headers)) {
    echo "Your Order  was successfully sent";
}else{
    echo "sorry, Failed to send email. Please try again later";
}
} catch (\Throwable $e) {
    echo $e->getMessage();
}
?>
        </div>
    </div>
</body>
</html>