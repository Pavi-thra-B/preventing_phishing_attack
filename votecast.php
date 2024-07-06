
<?php
include("db1.php");

//$query="select serial_No,party_name,party_symbol,vote from voting";
//$result=mysqli_query($conn,$query);
$query="select cand_id,name,symbol,photo from candidate";
$result=mysqli_query($conn,$query);
$vid="voterhomepage";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTE</title>
    <style>

body
{
  background-image: url("voting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}

.head li,h1,ul{
            display: inline;
        }
li {
            font-size: 1.5em;
        }

nav {
            border-style: double;
            border-color: black;
            color: black;
            background-color: rgb(6, 224, 240);
            padding: 5px;
            border-radius: 10px;   
        }
 .head_nav {
            margin-left: 80%;
        }
table,tr,td,th
{
    border:2px solid black;
    border-collapse:collapse;
   

}

table{
    margin-top:60px;
    border-collapse:collapse;
    width:100%;
    padding:3px;
    height:100px;
    text-align: center;
    background-color: rgb(6, 224, 240);
    column-width:auto;
}
th{
    color:black;
    style:solid;
    background-color:blue;
    font-size:1.2em;
}
td{
    vertical-align: middle;
}
.h{
    color:black;
    width:300px;
    height:30px;
    background-color: aqua;
    border:2px solid ;
    padding:5px;
    border-radius:10px;
    background-color: rgb(6, 224, 240);
    text-align:center;
    margin-top:50px;

}
.topic{
    font-size: 20px;
    text-align: center;
}

</style>
</head>
<body>
    <form action="votecastgetid.php">
<div class="head">
        <nav>
            <h1> Online Voting System</h1>
            <ul class="head_nav">
               
                <li><a href="http://localhost/ovs_ism/ism/voterpage.html">Go back</a></li>
            </ul>    
        </nav>
    </div>
    <center>
    <div class="h">
        <h1>VOTE PANEL</h1>
    </div>
    </center>
    
    <table>
        <div class="topic">
             <tr>
            <th>CANDIDATE ID</th>
            <th>NAME</th>
            <th>Symbol</th>
            <th>photo</th>
            <th>Vote</th>
           
        </tr>
        </div>
       
                                <?php
                                while($row=mysqli_fetch_assoc($result))
                                {
                                ?>
                                <td style="font-size:20"><?php echo $row['cand_id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                                               
                                <td><img src="data:image/jpeg;base64,
                                <?php echo base64_encode($row['symbol']); ?>"
                               alt="party Pic" width="100" height="100"></td>

                               <td><img src="data:image/jpeg;base64,
                                <?php echo base64_encode($row['photo']); ?>"
                               alt="party Pic" width="100" height="100"></td>
                               
                               <td><button class="btn" type="submit"><a href="votecastgetid.php?id=<?php echo $row['cand_id']; ?>">VOTE</button></td>
                                
                                
           

                              
                            </tr>
                                 <?php   
                                }
                                ?>
                            
                        </table>
                    </div>
</table>

</form>
</body>
</html>
