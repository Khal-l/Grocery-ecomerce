<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <div class="container">
        <div class="title"><a href="../index.php" class="navbar-brand">
            <h3>
                <i class="fas fa-shopping-basket"></i> Home Page
            </h3>
        </a></div>
        <hr>
        <div class="title">Create Account</div>
        <div class="content">
            <form method="post" action="">
                <div class="user-details">

                    <div class="input-box" style="width:50%">
                        <span class="details">First Name:</span>
                        <input type="text" name="fname" id="fname" placeholder="Enter First Name" required>
                    </div>

                    <div class="input-box" style="width:50%">
                        <span class="details">Last Name:</span>
                        <input type="text" name="lname" id="lname" placeholder="Enter Last Name" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Birth Date:</span>
                        <input type="text" id="datepicker" name="b-date" placeholder="Birth Date" required autocomplete="off">
                        <script>
                            $(document).ready(function() {
                                $(function() {
                                    $("#datepicker").datepicker();
                                });
                            })
                        </script>
                    </div>

                    <div class="input-box">
                        <span class="details">Email:</span>
                        <input type="Email" name="email" id="email" placeholder="Enter User Email" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Phone Number:</span>
                        <input type="tel" name="phone" placeholder="Enter Phone Number" pattern="[0-9]{}" required>

                    </div>
                    <div class="input-box" >
                        <span class="details">Username:</span>
                        <input type="text" name="username" id="username" placeholder="Enter Username" required>
                        <div id="usernameStatus"></div>

                    </div>
                    <script type="text/javascript" src="ajax_script.js"></script>

                    <div class="input-box" >
                        <span class="details">Password:</span>
                        <input type="password" name="password" id="pass" placeholder="Enter Password" required>
                        <i class="fas fa-eye" id="togglePassword"></i>
                        <script>
                            $("#togglePassword").click(function () {
                                var type = "text";
                                if ($("#pass").attr("type") != "password") {
                                    type = "password";
                                    $("#togglePassword").removeClass("fa-eye-slash");
                                    $("#togglePassword").addClass("fa-eye");
                                } else {
                                    $("#togglePassword").removeClass("fa-eye");
                                    $("#togglePassword").addClass("fa-eye-slash");
                                }
                                $("#pass").attr("type", type);
                            });
                        </script>
                    </div>




                </div>

                <div class="button">
                    <input type="submit" name="submit1" value="Create User">
                </div>
                <p>Already have an account? <a href="login.php">Login now</a>.</p>
            </form>
        </div>
    <?php

    include_once "connection.php";



    if (isset($_POST['submit1'])) {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $date = $_POST['b-date'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $name = $fname . " " . $lname;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);


        // insert info to db

        $stmt = $conn->prepare("INSERT INTO `User`(`name`, `b-date`, `username`, `password`, `Phone_number`, `Email_address`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssis", $name, $date, $username, $hashedpassword, $phone, $email);

        if (!$stmt->execute())
            die("Error account already exists");
    }
    ?>
    </div>




</body>

</html>