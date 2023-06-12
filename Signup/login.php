<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "connection.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT ID, username, password, user_type FROM User WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $ID, $username, $hashed_password, $user_type);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["ID"] = $ID;
                            $_SESSION["username"] = $username;
                            $_SESSION["user_type"] = $user_type;
                            
                            

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="title">Login</div>
        <p>Please fill in your credentials to login.</p>
        <div class="content">
        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="user-details">
            <div class="input-box">
                <span class="details">Username:</span>
                <input type="text" name="username" class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Enter your Username">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="input-box">
                <span class="details">Password:</span>
                <input type="password" name="password" id="pass" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder ="Enter your Password">
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
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
    </div>
            <div class="button">
                <input type="submit" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
    </div>
    </div>
</body>

</html>