<?php
session_start();
include("db1.php");

if(isset($_GET['vid']))
{
    $vid=$_GET['vid'];
}

if(isset($_GET['id']))
{
    $id=$_GET['id'];
}

if(isset($_GET['spw']))
{
    $spw=$_GET['spw'];
    echo "$spw";
}



//echo "$vid";
$query1="select status from  register where voteridnumber ='$vid' ";
//echo "<script>console.log('hii')</script>";
$result1=mysqli_query($conn,$query1);
if(mysqli_num_rows($result1) === 1)
{
$row1 = mysqli_fetch_assoc($result1);
$status= $row1['status'];
}
else
{
    echo '<script>';
    echo 'alert("Voter ID number is invalid");';
    echo 'window.location.href = "http://localhost/ovs_ism/ism/voterpage.html";';
    echo '</script>';
  
}
if($status==0)
{
   
    $query5="select total from candidate where cand_id='$id'";
    $result=mysqli_query($conn,$query5);
    if(mysqli_num_rows($result) === 1)
{
$row2= mysqli_fetch_assoc($result);
$total= $row2['total'];
}
$total=$total+1; 


$query4="update candidate set total=$total  where cand_id='$id'";
$result=mysqli_query($conn,$query4);
$query3="update register set status=1  where voteridnumber ='$vid'";
$result=mysqli_query($conn,$query3);
header("Location: votesuccess.php");

}


else
{
    echo '<script>';
    echo 'alert("You have already voted! No second vote is allowed");';
    echo 'window.location.href = "http://localhost/ovs_ism/ism/voterpage.html"';
    echo '</script>';
  
}


?>



