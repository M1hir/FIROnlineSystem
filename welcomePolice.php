<?php

 # Init the MySQL Connection
session_start();  
  
if(!$_SESSION['email'])  
{  
  
    header("Location: login.php");  
}  

include("db_connection.php");  

 # Prepare the SELECT Query
  $selectSQL = 'SELECT * FROM `fir`';
  
 # Execute the SELECT Query
 $selectRes=mysqli_query($dbcon,$selectSQL); 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style='background-color:#6699ff'>
<h3>Lodged FIRS till now</h3>
<table border="4" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Station</th>
      <th>Subject</th>
      <th>Crime type</th>
      <th>Name</th>
      <th>Address</th>
      <th>City</th>
      <th>Postal</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Complaint</th>
      <th>Place of incident</th>
      <th>Date of incident</th>
      <th>Time of incident</th>
    </tr>
  </thead>
  <tbody>

    <?php
      if( mysqli_num_rows( $selectRes )== 0 ){
        echo '<tr><td colspan="13">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['station']}</td><td>{$row['subject']}</td><td>{$row['type']}</td><td>{$row['name']}</td><td>{$row['address']}</td><td>{$row['city']}</td><td>{$row['postal']}</td><td>{$row['phone']}</td><td>{$row['email']}</td><td>{$row['complaint']}</td><td>{$row['place']}</td><td>{$row['date']}</td><td>{$row['time']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>
    <?php
  

?>