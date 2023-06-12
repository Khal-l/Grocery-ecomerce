<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


// create instance of Createdb class
$database = new CreateDb("moki_productdb", "Producttb");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
 <!-- Google Fonts-->

 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
<!--For bootstrap icons-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style2.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
<!--For bootstrap icons-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>


<?php require_once ("php/header.php"); ?>
<?php require_once ("php/mainimage.php"); ?>
<?php require_once ("php/categories.php"); ?>



<section class="product">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-5 m-auto text-center">
                <h1>What's Trending</h1>
                <h6 style="color: rgba(0, 153, 255, 0.884);">WE do care for your choices</h6>
            </div>
        </div>
        <div class="row">
        <div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>
        </div>
</div>
    </div>
</section>
<section class="shop">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-5 m-auto text-center">
                <h1>Our Offers</h1>
                <h6 style="color: rgba(0, 153, 255, 0.884);">WE do care for your choices</h6>
            </div>
        </div>
        <div class="row">
        <div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>
        </div>
</div>
    </div>

</section>
<section class="subscribe py-5">
    <div class="container text-white py-5">
    <div class="row py-5">
        <div class="col-lg-6">
            <h1 style="color: black;" class="font-weight-bold py-3">Subscribe to recieve our latest offers</h1>
            <h6 style="color: black;">WE do dare to offer the best sevice</h6>
            <form class="d-flex form-sub" method="POST"action="">
                <input class="px-2 sub" type="email" placeholder="Subscribe" aria-label="Subscribe" name="emailsub">
                <input class="btn0" type="submit" name="subscribe">
              </form>
              
        </div>
    </div> 
    </div>
</section>
 <section class="contact py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <h1>Contact Us</h1>
                <h6 style="color: rgba(0, 153, 255, 0.884);">Always be in touch with us</h6>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-lg-9 m-auto">
                <div class="row">
                    <div class="col-lg-4">
                        <h6>LOCATION</h6>
                        <P>Beirut,Lebanon</P>
                    
                   
                        <h6>Phone</h6>
                        <p>00961 03 222 222</p>
                   
                    
                        <h6>Email:</h6>
                        <p>rhuteam@rhu.com</p>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control bf-light" placeholder="First Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control bf-light" placeholder="Last Name">
                            </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 py-3">
                            <textarea name="" class="form-control bg-light" id="" cols="10" rows="5" placeholder="Enter Your Message"></textarea>
                        </div>
                    </div>
                    <button class="btn1">Submit</button>
                </div>

                </div>
            </div>
        </div>
    </div> 
 </section>





<?php require_once ("php/footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
