<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Slot</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
</head>
    
   
    
    
<body><center>
    <h1>Request Freeup Slot</h1><br><br>
    <h3>Do You Want To Free The Slot At Which Your Car Is Parked?</h3>
    <br>
    <br>
    <form action="request_freeup.php" method="post">
    <p for="car_id">Enter Car Id:</p>
    <input name="car_id" id="car_id" placeholder="Enter Car_id">
    
    
    <br><br>
    <button id="btn1" name="btn1" type="submit">Request</button>
    <button id="btn2" name="btn2" type="submit" ><a style="text-decoration:none" href="user_home.php">Go Back</a></button>
        </form>
    </center>
    
    </body>    


</html>

<?php 
    include("database.php");
    
    if(isset($_POST["btn1"])){
        
        $owner_id=$_SESSION['log_name'];
        
        
        
        $car_id = $_POST["car_id"];
        
        $query12="select occupied from lot_table where car_id=".$car_id."";
        $rs12=mysqli_query($conn,$query12)or die("occupied");
        if(mysqli_num_rows($rs12)==0){
            
            
                echo "<br> <div class=\"alert alert-warning alert-dismissible\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Error!</strong> Car is not parked!
      </div>";
                
            }
            else{
                
                $query0="insert into freeup values(".$owner_id.",".$car_id.")";
            
        
        
        
        if(mysqli_query($conn,$query0)){
            
            echo"<br><div class=\"alert alert-success alert-dismissible\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Success!</strong> Requested Successfully ..</div>";
            
        }
        
        
        else{
            echo "<br> <div class=\"alert alert-warning alert-dismissible\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Error!</strong>Request Failed 
      </div>";
            
        }
            }
}
        
        
    
    
    
    ?> 