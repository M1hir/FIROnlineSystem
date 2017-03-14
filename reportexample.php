<?php
session_start();
include("db_connection.php"); 
 
 if(isset($_POST['mobilesearch']))  
  {  
$check_user2="select * from complaintDB WHERE mobileNo ='".$_POST['mymobile']."' & fir_date ='".$_POST['fir_date']. "'";
    $run=mysqli_query($dbcon,$check_user2);  
 if(mysqli_num_rows($run)>0)  
    { 
 $rows=mysqli_fetch_array($run);
  $phone=$rows['mobileNo'];
  $address=$rows['address'];
  $email=$rows['emailId'];
  $postCode=$rows['postCode'];
  $cname=$rows['compName'];
  $description=$rows['description'];
  

   }
  }
?>
  