<?php 
session_start(); ?>


<!DOCTYPE html>
<html>
<head>
    <title> User Home </title>
    <link href="css/style_home.css?<?php echo time(); ?>" rel="stylesheet">
</head>
<body background="img/3.jpg">
    <ul>

    <li> <a> PARKING </a>
        <ul>
               <li> <a href="request_parking.php"> REQUEST PARKING </a> </li> 
            
            
            <li> <a href="request_status.php">IN REQ STAT </a> </li>
            
            <li> <a href="request_freeup.php"> REQUEST FREEUP </a> </li>
            
            
            <li> <a href="request_status_out.php">OUT REQ STAT </a> </li> 
        </ul>
    </li>
    <li> <a> HISTORY </a>
        <ul>
            <li> <a href="user_parking_history.php"> PARKING HISTORY </a> </li>        
        </ul>
    </li>
    <li> <a> WARNING </a>
        <ul>
            <li> <a href="user_recieved_complaint.php"> VIEW WARNING </a> </li>        
        </ul>
    </li>
    <li> <a> COMPLAINT </a>
        <ul>
            <li> <a href="complaint_form_from_user.php"> REPORT COMPLAINT </a> </li>      
	    <li> <a href="user_sent_compliants.php"> VIEW COMPLAINTS </a> </li>   
        </ul>
    </li>
        <li> <a href="user_car_details.php"> CAR DETAILS </a> </li>
    
    

    <li> <a href="logout.php"> LOGOUT </a> </li>
    </ul>
    
    <?php 
    include("database.php");
     $query14="select owner_fname,owner_lname from owner_table where owner_id=".$_SESSION['log_name']." ";
    
    $rs14=mysqli_query($conn,$query14);
    
    if(mysqli_num_rows($rs14)>0){
        
        $row14=$rs14->fetch_assoc();
        
        echo '<span style="color: white;
    font-size: 40px;
    line-height: 250px;
    position: absolute;
    bottom:0px ;
    right: 10px;
             }">Hello</span><br>
    <span style="color: white;
    font-size: 50px;
    line-height: 50px;
    position: absolute;
    bottom: 0;
    right: 10px;text-align:right;
}">'.ucwords($row14['owner_fname']).'<br>'.ucwords($row14['owner_lname']).'</span>';
        
    }
    
    
    
    ?>
    
    <span id="wel">Welcome To<br></span><span id="homepark">HomePark</span> 

</body>
</html>