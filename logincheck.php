<?php
session_start();
include("db1.php"); // Include your database connection file

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform SQL query to check if the username and password match
    $query = "SELECT * FROM password_voter WHERE voterid='$username' AND share1='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        // If a match is found, set session variables and redirect to dashboard
        $_SESSION['username'] = $username;
        header("Location: reg.php");
    } else {
        // If no match is found, display an error message
        $error = "Invalid username or password";
    }
}
?>

