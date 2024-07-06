

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Election</title>
    <link rel="stylesheet" href="election.css">
    <style>
        .container {
    display: flex;
    flex-direction: column;
    align-items: center;
   
    height: 100vh;
}
body
{
  background-image: url("voting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}
.form-container {
    width: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-top: 20px;
    margin-left:0px;
}

h2.create {
    text-align: center;
}

form {
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
input[type="submit"] {
    width: 50%; /* Adjust the width as needed */
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin:  auto; /* Center horizontally */
}


input[type="submit"]:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <div class="container">
        <h2 class="create">Election Creation</h2>
        <div class="form-container">
            <form>
                <label for="election_name">Election Name:</label><br>
                <input type="text" id="election_name" name="election_name" required><br><br>
                
                <label for="start_date">Start Date:</label><br>
                <input type="date" id="start_date" name="start_date" required><br><br>
                
                <label for="end_date">End Date:</label><br>
                <input type="date" id="end_date" name="end_date" required><br><br>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>