

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complian</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    

</head>
<body>
    <div class="container-fluid">
    <br>
    <center><h2 class="title" >Report on Customer</h2></center>
    <br>
    <br>
    <form class="form" id="complaint_from_admin" method="POST" action="complaint_form__from_admin.php">
        <div class="form-group">
            <label for="ownerid">Enter Owner-id</label>
            <input id="ownerid" name="ownerid" class="form-control" type="text" required>
            <br>
          <label for="complain">Enter Complain:</label>
          <textarea id="complaint" name="complaint" class="form-control" rows="10" cols="50" required></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your complain with anyone else.</small>
        </div>
        <!--
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
    -->
    <br>
    <br>
        <button type="submit" id="admin_sub"
    name="admin_sub" class="btn btn-primary">Submit</button>
        
        <button  id="back"
     class="btn btn-primary"><a href="admin_home.html" style="color:white;text-decoration:none">Go Back</a></button>
      </form>
      <br>
      <br>
    </div>
</body>
</html>

<?php

    
    
if(isset($_POST['admin_sub'])){
    include("database.php");
    
    
    $owner_id = $_POST["ownerid"];

    $complaint = $_POST["complaint"];

    $query="insert into admin_complaint values(".$owner_id.",'".$complaint."');"or die("Failed");

    $rs=mysqli_query($conn,$query);
    
    echo"<div class=\"alert alert-success alert-dismissible\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Success!</strong> Complaint Reported..</div>";
    unset($_POST['admin_sub']);
}



?>