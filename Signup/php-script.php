<?php
include("connection.php");
if (!empty(isset($_POST['username'])) && isset($_POST['username'])) {
  $usernameInput = $_POST['username'];
  checkUsername($conn, $usernameInput);
}
function checkUsername($conn, $usernameInput)
{
  $query = "SELECT username FROM User WHERE username='$usernameInput'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    echo "<span style='color:red'>This username is taken. Try another</span>";
  } else {
    echo "<span style='color:green'>This username is available</span>";
  }
}
