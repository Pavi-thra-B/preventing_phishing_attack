<?php
include("db1.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
$home="votecast";
//$vid = "123";

// Check if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve voterID from the form
    $vid = $_POST['vid'];
    $spw = $_POST['spw'];

    $query = "SELECT * FROM password_voter WHERE voterid='$vid' AND secretpassword='$spw'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        // If a match is found, set session variables and redirect to dashboard
        $_SESSION['username'] = $username;
        header("Location: votecastreg.php?id=" . urlencode($id) . "&vid=" . urlencode($vid));
        //header("Location: votecast.php");
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
    <title></title>

    <style>

        

#h
{
    margin-top:1px;
}
#h1
{
    margin-top:40px;
    margin-left: 30px;
    
}

.topic1
{
  
    height:50px;
    width:1320px;
    background-color: rgb(6, 224, 240);
    padding:10px;
    border-color:black;
    border-radius:10px;
    margin-left:10px;
    border-style:double;
  
   
    
}

body
{
  background-image: url("voting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}


.option {
    height: 3%;
    display: flex;
    align-items: center;
    margin-top:10px;
  }

nav {
    flex: 1;
    text-align: right;
   
  }
  nav ul li {
    list-style: none;
    display: inline-block;
    font-size: 13px;
    font-weight:lighter;
  }
  .box
  {
    margin-left:450px;
    margin-top:90px;
    width:380px;
    height: 300px;
    background-color:aqua;
    border:2px solid darkblue;
    padding:2px;
    border-radius: 20px;
  }

  .btn 
{
    width:100px;
    height:25px;
   
    background-color:lightblue;
    border:2px solid darkblue;
    color:black;
    padding:5px;
    border-radius:2px;
    margin-top:10px;
    margin-left:120px;
}
#spw
{
margin-top:10px;
    margin-left:50px;
    padding:5px;
    width:75%;
}
#vid 
{
    margin-top:10px;
    margin-left:50px;
    padding:5px;
    width:75%;
}

{
  background-image: url("voting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}
    </style>
</head>
<body>
<?php if(isset($error)) { ?>
        <h3 style="color:red;"><?php echo $error; ?></h3>
    <?php } ?>
<form  action="" method="post" id="form">
    <div class="box">
        <center>
            <h3>Vote Cast</h3>
        </center>
        <hr id="#line">
        <br><br>
        <label id="h1" for="text">VoterID_number: </label>
        <br>
        <input type="text" name="vid" id="vid" placeholder ="Enter your voterID number">

        <label id="h1" for="text">Secret Password: </label>
        <br>
        <input type="password" name="spw" id="spw" placeholder ="Enter your secret password">
<br>
<br>
<button type="submit" class="btn">submit</button>


    </div>

    </form>
</body>
<script>
   
    const vid=document.getElementById("vid");
   
    form.addEventListener("submit", (e) => {
if (!validateInputs()) {
  e.preventDefault();
}
});
function validateInputs()
{
     const nvid = vid.value.trim();

    if(nvid==="")
    {
        alert("Provide a valid voterID number");
        return false;
    }
         else if(nvid.length < 10 || nvid.length > 10)
    {
        alert("Provide a valid VoterID number");
        return false;
    }
    else
    {
        return true;
    }

}

</script>
</html>
