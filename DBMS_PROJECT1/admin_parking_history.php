<!DOCTYPE html>
<html>
<head>
  <title> Parking History </title>
</head>

<body>
  <table >
  <tr>
    <th> <center> Lot Id </center> </th>
    <th> <center> Car Id </center> </th>
    <th> <center> Owner Id </center> </th>
    <th> <center> First Name </center></th> 
    <th> <center> Last Name </center> </th> 
    <th> <center> Mobile No </center> </th> 
    <th> <center> In-Time </center> </th> 
    <th> <center> Out Time </center> </th>
  </tr>

<?php

  include("database.php");

  $sql = "SELECT * FROM parking_history";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc()) 
    {  
        
        if($row["out_time"]==0){
      echo "<tr><td>" . $row["lot_id"]. "</td><td>" . $row["car_id"]. "</td><td>" . $row["owner_id"]. "</td><td>" . $row["owner_fname"] .  "</td><td>" . $row["owner_lname"]. "</td><td>" . $row["owner_phno"]. "</td><td>" . $row["in_time"]. "</td><td>Currently Parked</td></tr>";
    }
        else{
            echo "<tr><td>" . $row["lot_id"]. "</td><td>" . $row["car_id"]. "</td><td>" . $row["owner_id"]. "</td><td>" . $row["owner_fname"] .  "</td><td>" . $row["owner_lname"]. "</td><td>" . $row["owner_phno"]. "</td><td>" . $row["in_time"]. "</td><td>".$row["out_time"]."</td></tr>";
            
        }
    }

    echo "</table>";
  }
  else 
    { 
      echo "<tr><td></td><td></td><td> NO RECORD OF PARKING.</td><td></td></tr></table>";
    }

  $conn->close();
?>
  </table>
  <center> <a href="admin_home.html"> Back </a> </center>
</body>
</html>