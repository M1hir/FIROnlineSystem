<?php  
session_start();  
  
if(!$_SESSION['email'])  
{  
  
    header("Location: login.php");  
}  

include("db_connection.php");  
  
if(isset($_POST['formfilled']))  
{  
    $station=$_POST['station'] . ""; 
    $subject=$_POST['subject'] . ""; 
    $type=$_POST['type'] . ""; 
    $name=$_POST['name'] . ""; 
    $address=$_POST['address'] . ""; 
    $city=$_POST['city'] . ""; 
    $postal=$_POST['postal'] . ""; 
    $phone=$_POST['phone'] . ""; 
    $email=$_POST['email'] . ""; 
    $complaint=$_POST['complaint'] . "";  
    $place=$_POST['place'] . ""; 
    $date=$_POST['date'] . ""; 
    $time=$_POST['time'] . ""; 
  

    $insert_user="insert into fir(station, subject, type, name, address, city, postal, phone, email, complaint, place, date, time) values('$station', '$subject', '$type', '$name', '$address', '$city', '$postal', '$phone', '$email', '$complaint', '$place', '$date', '$time')"; 
    


    $run=mysqli_query($dbcon,$insert_user);  

}  

?> 
  
<html>  
<head lang="en">  
    <meta charset="UTF-8">   
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">'
</head>
    <title>  
    Registration  
    </title>   
</head>  
<style>
input[type=text]:focus {
    background-color:lightblue  ;
    border: 3px solid #555;
    display: block;
}
input[type=email]:focus{
    background-color:lightblue  ;
    border: 3px solid #555;
}
select{
    background-color:lightblue  ;
    border: 3px solid #555;
}
.login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
    }  
</style>  

<body style='background-color:#E0FFFF'> 

  
<form role="form" method="post" action="Welcome.php">
<div class="table-scrol">  
    <h3 align="center">FIR FORM</h3>  
 <?php
echo $_SESSION['email'];    
?>  
<div class="table-responsive">   
<table border="1"class="table table-bordered table-hover table-striped">
<tr>
 
			<td> <b>	Station: </b> </td>
<td>
				<select class="c" id="station" name="station" >
    				<option value="a">Select</option>
      				<option value="andheri">Andheri</option>
     				<option value="borivali">Borivali</option>
      				<option value="matunga">Matunga</option>
      				<option value="powai">Powai</option>
      				<option value="thane">Thane</option>
     				<option value="vashi">Vashi</option>
      				</select>  
   
</td>          
</tr>
<tr>                             
			<td> <b>	Subject: </b> </td>
                              <td>  <input class="c" name="subject" type="text" size="50"> </td>  
</tr>                              

<tr>
			 
			<td> <b>	Crime Type: </b> </td>
<td>
				<select class="c" id="type" name="type">
    				<option value="a">Select</option>
      				<option value="robbery">Robbery</option>
     				<option value="kidnap">Kindapping</option>
      				<option value="rape">Rape</option>
      				<option value="assault">Assualt</option>
      				<option value="homicide">Homicide</option>
      				</select>  
</td>          
</tr>
<tr>                               
 
			<td> <b>	 Name: </b> </td>
                                <td> <input class="c" name="name" type="text" size="50" > </td> 
</tr>                           
<tr>
                             
			<td> <b>	Address: </b> </td>
                            <td>    <input class="c"  name="address" type="text"  size="50">  </td>
 </tr>                            
<tr>
			 
                           <td>  <b>   City: </b> </td>
<td>
				<select class="c" id="city"  name="city" >
    				<option value="a">Select</option>
      				<option value="mumbai">Mumbai</option>
     				<option value="delhi">Delhi</option>
      				<option value="thane">Thane</option>
      				<option value="bangalore">Bangalore</option>
      				<option value="kolkata">Kolkata</option>
      				</select>  
</td>
</tr>
<tr>                             
			<td> <b>        Postal: </b> </td>
                               <td> <input class="c" name="postal" type="text" size="50" >  </td>                          
</tr>          
<tr>                  
			<td> <b>	Phone: </b> </td>
                              <td>  <input class="c"  name="phone" type="text"  size="50">  </td>
 </tr>                             
   <tr>                           
			<td>	<b>	Email: </b> </td>
                              <td>    <input class="c" name="email" type="email" size="50" >   </td> 
        </tr>                       
        <tr>                      
			<td> <b>	Complaint: </b> </td>
			    <td>     <input class="c"  name="complaint" type="text" size="50" >  </td> 
    </tr>                           
    <tr> 
                             
				<td> <b>	Place of incident: </b> </td>
                        <td>          <input class="c"  name="place" type="text" size="50" >   </td> 
        </tr>
<tr>                       
                             
				<td> <b>	Date of incident:  </b> </td>
                            <td>      <input class="c" name="date" type="text" size="50"  >   </td> 
        </tr> 
<tr>                       
                             
				<td> <b>	Time of incident: </b> </td>
                            <td>      <input class="c"  name="time" type="text" size="50" >  </td> 
</tr>                       
        </div>  
</div> 
  
</table>			
		  <input class="btn btn-lg btn-success btn-block" type="submit" value="Submit" name="formfilled" >  
  
                            
                    </form>    

<h5><a href="logout.php">Logout here</a> </h5>  
  
  
</body>  
  
</html>  