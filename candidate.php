<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified Candidate</title>
    <link rel="stylesheet" href="candidate.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 400px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-left:10px;
}

.title {
    text-align: center;
    color: #333;
}

form {
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="file"] {
    width: calc(100% - 16px); /* Subtract padding and border width */
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

body
{
  background-image: url("voting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}  </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Candidate Verification</h2>
        <div class="form-container">
            <form method="post" action="verify_candidate.php" enctype="multipart/form-data">
                <label for="candidate_name">Candidate Name:</label><br>
                <input type="text" id="candidate_name" name="candidate_name" required><br><br>
                
                <label for="candidate_id">Candidate ID:</label><br>
                <input type="text" id="candidate_id" name="candidate_id" required><br><br>
                
                <label for="verification_image">Verification Image:</label><br>
                <input type="file" id="verification_image" name="verification_image" accept="image/*" required><br><br> 
                <input type="submit" value="Verify">
            </form>
        </div>
    </div>
</body>
</html>