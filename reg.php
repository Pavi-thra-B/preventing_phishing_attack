<?php
session_start();
include("db1.php");
if($_SERVER['REQUEST_METHOD']== 'POST')
{
  $firstname= $_POST['firstname'];
  $lastname= $_POST['lastname'];
  $voterid=$_POST['voterid'];
   $Aadharnumber= $_POST['Aadharnumber'];
  $DOB= $_POST['DOB'];
  $Age=$_POST['Age'];
  $phno= $_POST['phno'];
  $email= $_POST['email'];
  $pass= $_POST['pass'];
  
  
  

  $query = "INSERT INTO register (firstname, lastname, voteridnumber, aadharnumber, DOB, Age, `Phone number`, `Email address`, Password) 
  VALUES ('$firstname', '$lastname', '$voterid', '$Aadharnumber', '$DOB', '$Age', '$phno', '$email', '$pass')";
mysqli_query($conn, $query);

header("Location: share1.php?email=" . urlencode($email) . "&voterid=" . urlencode($voterid));

 
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
body
{
  background-image: url("voting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}
#form {
  height:1000;
  width: 500px;
  margin: 10vh auto 0 auto;
  background-color: rgb(6, 240, 240);
  border-radius: 30px;
  padding: 60px;
  margin-left:100px;
}
#form button {
  background-color: rgb(123, 255, 0);
  color: black;
  border: 1px solid;
  padding: 0px;
  margin: 10px 0px;
  cursor: pointer;
  border-radius: 5px;
  font-size: 20px;
  width: 50%;
  margin-left: 100px;
  margin-top: 26px;
}


.inputgroup.success input {
    
    border:2px solid rgb(11, 197, 11)
  }
  .inputgroup.error input {
    
    border:2px solid red;
  }

  .inputgroup.error {
  color: black;
}
.inputgroup input:focus {
  outline: 0;
}

.inputgroup.error #pw {
  color: rgb(238, 25, 25);
  margin-left:15%;
 
}
.inputgroup input {
  outline: 0;
  display: flex;
  font-size: 13px;
  width: 50%;
  padding: 5px;
  margin-left: 15%;
  margin-top: 2%;
  margin-bottom: 2%;
  
}
#topic
{
    height:70px;
    width:100%;
    background-color:rgb(0, 162, 255);
    border-radius:10px;
    padding:2px;
}
.inputgroup {
  margin-bottom: 15px;
  margin-right:10px;
  width: 100%;
}

.required
{
    margin-left:30px;
    margin-right:100;
}
    </style>

    <script>

    </script>
</head>
<body>
    <div id="topic">

   <center><h1>ONLINE VOTING SYSTEM</h1></center> 
    
</div>
<form  method="POST" id="form" >
        <center><h2>Registration</h2></center>
        <div class="inputgroup">
            <label class="required" for="firstname">Firstname</label>
            <input
              type="text"
              id="firstname"
              name="firstname"
              placeholder="Enter your firstname"
            />
            <div class="error" id="pw"></div>
          </div>
          <div class="inputgroup">
            <label class="required" for="Lastname">Lastname </label>
            <input
              type="text"
              id="lastname"
              name="lastname"
              placeholder="Enter your lastname"
            />
            <div class="error" id="pw"></div>
          </div>
          <div class="inputgroup">
            <label class="required" for="Voter ID number">Voter ID number </label>
            <input
              type="int"
              id="voterid"
              name="voterid"
              placeholder="Enter your voter ID number"
            />
            <div class="error" id="pw"></div>
          </div>
          <div class="inputgroup">
            <label class="required" for="aadhar">Aadhar number</label>
            <input
              type="int"
              id="Aadharnumber"
              name="Aadharnumber"
              placeholder="Enter your Aadhar number"
            />
            <div class="error" id="pw"></div>
          </div>
          <div class="inputgroup">
            <label class="required" for="DOB">DOB</label>
            <input
              type="date"
              id="dob"
              name="DOB"
             
              placeholder="Enter your Date of birth"
            />

            <div class="error" id="pw"></div>
          </div>
          <div class="inputgroup">
            <label class="required" for="age">Age</label>
            <input type="int" id="age" name="Age" placeholder="Enter your age"/>
            <div class="error" id="pw"></div>
          </div>

          <div class="inputgroup">
            <label class="required" for="phno">Phone number</label>
            <input
              type="int"
              id="phno"
              name="phno"
              placeholder="Enter your phone number"
            />
            <div class="error" id="pw"></div>
          </div>
          <div class="inputgroup">
            <label class="required" for="email">Email ID</label>
            <input
              type="text"
              id="email"
              name="email"
              placeholder="Enter your Email address"
            />
            
            <div class="error" id="pw" ></div>
          </div>
          <div class="inputgroup">
            <label class="required" for="password">Password</label>
            <input
              type="text"
              id="pass"
              name="pass"
              placeholder="Create your password"
            />
            <div class="error" id="pw"></div>
          </div>
  <button type="submit">Register</button>
    </form>

</body>
</html>

<script>

const form = document.getElementById("form");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const voterid = document.getElementById("voterid");
const aadharnumber = document.getElementById("Aadharnumber");
const phno = document.getElementById("phno");
const email = document.getElementById("email");
const pass = document.getElementById("pass");
const dob = document.getElementById("dob");


form.addEventListener("submit", (e) => {
if (!validateInputs()) {
  e.preventDefault();
}
});






function validateInputs() {
let suc = true;
const newfns = firstname.value.trim();
const newlns = lastname.value.trim();

const voterids = voterid.value.trim();
//console.log(voterids);
const emails = email.value.trim();

const aadharnumbers = aadharnumber.value.trim();
const ages = age.value.trim();
const phnos = phno.value.trim();
const dobs=dob.value.trim();
const password = pass.value.trim();





if (newfns === "") {
  suc = false;
  seterror(firstname, "Firstname is required");
} else {
  setsuccess(firstname);
}
if (newlns === "") {
  suc = false;
  seterror(lastname, "Lastname is required");
} else {
  setsuccess(lastname);
}

if (voterids === "") {
  suc = false;
  seterror(voterid, "Voterid number is required");
} else if (voterids.length < 10 || voterids.length > 10) {
  suc = false;
  seterror(voterid, "Voter ID number must be 10 characters");
} else {
  setsuccess(voterid);
}
if(dobs === "")
{
  suc=false;
  seterror(dob, "DOB is required");

}
else
{
  setsuccess(dob);
}
if (emails === "") {
  suc = false;
  seterror(email, "Email is required");
} else if (!valideemail(emails)) {
  suc = false;
  seterror(email, "Please enter a valid email");
} else {
  setsuccess(email);
}

if (aadharnumbers === "") {
  suc = false;
  seterror(aadharnumber, "Aadhar number is required");
} else if (aadharnumbers.length < 12 || voterids.length > 12) {
  suc = false;
  seterror(aadharnumber, "Aadhar number must be 12 numbers");
} else {
  setsuccess(aadharnumber);
}
if (phnos=== "") {
  suc = false;
  seterror(phno, "Phone number is required");
} else if (phnos.length < 10 || phnos.length > 10) {
  suc = false;
  seterror(phno, "Phone number should be 10 numbers");
} else {
  setsuccess(phno);
}

if (ages === "") {
    suc = false;
    seterror(age, "Age is required");
  } else if (ages < 18) {
    suc = false;
    seterror(age, "Age should be above 18");
  } else {
    
    setsuccess(age);
  }

  if (password === "") {
    suc = false;
    seterror(pass, "Set your password");
  }
  else if(password .length<8 || !checkpass(password) )
  {
    suc = false;
    seterror(pass, "Provide a strong password");
  } 
  else {
    setsuccess(pass);
  }

  return suc;

}
  function checkpass(pass1)
{
  var pas=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  if(pass1.match(pas))
  {
    return true;
  }
  else
  {
    return false;
  }


  
}

function seterror(element, msg) {
const Inputgroup = element.parentElement;
const errorelement = Inputgroup.querySelector(".error");
errorelement.innerText = msg;
Inputgroup.classList.add("error");
Inputgroup.classList.remove("success");
}
function setsuccess(element) {
const Inputgroup = element.parentElement;
const errorelement = Inputgroup.querySelector(".error");
errorelement.innerText = "";
Inputgroup.classList.add("success");
Inputgroup.classList.remove("error");
}
const valideemail = (email) => {
const re =
  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(String(email).toLowerCase());
};


</script>