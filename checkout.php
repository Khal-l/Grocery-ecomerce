<!DOCTYPE html>
<html>

<head>
    <title>Delivery Address</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
        <link rel="stylesheet" href="Signup/login.css" />

   
</head>

<body>
    <div class="container">
        
        <div class="title">Deliver to your Doorstep</div>
        <div class="content">
            <form method="post" action="sending_email.php">
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Address (Area and Street)</span>
                        <input type="text"  id="address" name="address" placeholder="Enter Your Address" required>
                    </div>

                    <div class="input-box">
                        <span class="details">City/District/Town:</span>
                        <input type="text" id="city" name="city" placeholder="Enter City" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Zip/Postal Code:</span>
                        <input type="text" id="code" name="code" placeholder="Enter Code"  pattern="\d{4}" required >
                        
                    </div>

                    
                </div>

                 
                <div class="button">
                <input type="submit" name="submit2" id="submit2"  value="Deliver" />
                </div>

                
        

            </form> 

        </div>

    </div>
</body>


</html>