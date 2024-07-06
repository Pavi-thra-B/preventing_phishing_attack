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
        header("Location: voterpage.html");
    } else {
        // If no match is found, display an error message
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form {
            height: 400px;
            width: 400px;
            margin-left: 0px;
            background-color: white;
            margin-top: 70px;
        }
        tr, td, h1 {
            padding: 20px;
            font-family: 'Times New Roman', Times, serif;
        }
        button {
            border-radius: 2px;
            border: none;
            background-color: burlywood;
            width: 100px;
            height: 30px;
        }
        body {
            background-image: url("voting.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <center>
    <?php if(isset($error)) { ?>
        <h3 style="color:red;"><?php echo $error; ?></h3>
    <?php } ?>
    <form method="POST" id="form"  >
        <h1>Login Page</h1>
        <table >
            <tr>
                <td>Username:</td>
                <td><input type="text" id="username" name="username" onmouseleave="getShareAndSetPassword()"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password"  ></td>
            </tr>
            <tr>
                <td><button type="submit">Login</button></td>
            </tr>
        </table>
    </form>
</center>
<script>
function getShareAndSetPassword() {
    var username = document.getElementById('username').value;
    var passwordInput = document.getElementById('password');

    // AJAX request to fetch share value
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var share = xhr.responseText;
            if (share) {
                passwordInput.value = share; // Set share as the password input value
            } else {
                passwordInput.value = ''; // Clear password input if share not found
            }
        }
    };
    xhr.open('POST', 'get_share.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('username=' + encodeURIComponent(username));
}
</script>


</body>
</html>
