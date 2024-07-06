<?php
// Include your database connection file
include("db1.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve username from the AJAX request
    $username = $_POST['username'];

    // Perform SQL query to retrieve the share value for the given username
    $query = "SELECT share1 FROM password_voter WHERE voterid='$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        // If a match is found, fetch the share value
        $row = mysqli_fetch_assoc($result);
        $share = $row['share1'];
        echo $share; // Return the share value as the response
    } else {
        // If no match is found, return an empty response
        echo "";
    }
}
?>
