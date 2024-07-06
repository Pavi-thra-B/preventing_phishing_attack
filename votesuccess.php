<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votecast success</title>
    <style>
        body


.form
{
    margin-top:160px;
    width:600px;
    height:250px;
    border:2px solid darkblue;
    background-color: aqua;
    border-radius:10px;
    padding:10px;
}
#h1
{
    color:darkgreen;
    animation:blow 3s infinite linear;
    
}

@keyframes blow
{

    0%
    {
        transform:translateY(0) scale(1);
    }
    50%
    {
        transform:translateY(-10px) scale(1.05);
    }
}

.btn
{
padding:10px;
border-radius:5px;
background-color: darkblue;
border:1px solid black;
color:white;
transition: 400ms;
font-weight: bold;
}

.btn:hover {
   
   transform: scale(1.03);
 }
 #a
 {
    color:white;
 }

 {
  background-image: url("voting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}
   
    </style>
</head>
<body>
    <center>

    <div class="form">
        <br>
        <h1 id="h1">Successfully Casted Your Vote! </h1>
        <h2>Your Civic Duty is Fulfilled..</h2>
        <br>
        <button class="btn"><a href="http://localhost/ovs_ism/ism/voterpage.html" id="a">LOGOUT</a></button>

    </div>
    </center>
</body>
</html>