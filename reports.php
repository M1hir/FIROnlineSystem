<?php  
        include("db_connection.php");  
        
        $view_users_query="select * from complaintdb"; 
        $run=mysqli_query($dbcon,$view_users_query);
        while($row=mysqli_fetch_array($run))
        {  
            
  $station=$row[10]; 
    $subject= $row[11]; 
    $type=$row[3];  
    $name=$row[3]; ; 
    $address=$row[4]; ;
    
    $postal=$row[5]; 
    $phone=$row[6];  
    $email=$row[7]; 
    $complaint=$row[8];   
    $place=$row[11]; 
    $occupation=$row[10]; 

    $description=$row[9]; 
    $incident_date=$row[13]; 

    $incident_time=$row[14]; 

    $statusid=$row[15]; 

    $comments=$row[16]; 

  
         
  } ?>  
  


<!DOCTYPE html>
<html lang="en">
<head>
<title>FIR Online-Reports</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="login.php">FIR Online</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li   id="profile-messages" ><a title="" href="#"data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
	
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
  <ul>
    <li><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li class="submenu active"> <a href="#"><i class="icon icon-list"></i> <span>Forms</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="form-common.php">File FIR</a></li>
        <li><a href="form-validation.html">Issue NOC</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>TOOLS</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="calendar.html">Calendar</a></li>
    
        <li><a href="chat.html">Chat option</a></li>
      </ul>
    </li>
    
  </ul>
</div>
<div id="content" span="span14">
  
   <div class="table-scrol">  
    <h3 align="center">All the FIR</h3>  
  
<div class="table-responsive"> 
  
  
    <table border="4 "class="table table-bordered table-hover table-striped" >  
        <thead>  
  
        <tr>  
  
            <th>Station</th>  
            <th>Subject</th>  
	     <th>Type</th>            
  	     <th>Name</th>

            <th>Occupation</th>  
	    <th>Phone No.</th>
            <th>Email ID</th>  
            

            <th>Address</th>  
            <th>Postal</th>

            <th>Complaint</th>
            <th>Place</th>  
            <th>Description</th>  
            <th>Date</th>
            <th>Time</th>
            <th>Status ID</th>
        </tr>  
        </thead>  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $station;  ?></td>  
            <td><?php echo $subject;  ?></td>
            <td><?php echo $type;  ?></td> 
            <td><?php echo $name;  ?></td> 
            <td><?php echo $occupation;  ?></td> 

            <td><?php echo $phone;  ?></td>   
            <td><?php echo $email;  ?></td>  

            <td><?php echo $statusid;  ?></td>  

            <td><?php echo $address;  ?></td> 

            <td><?php echo $postal;  ?></td>   

            <td><?php echo $place;  ?></td> 

 
            <td><?php echo $email;  ?></td>  
            <td><?php echo $description;  ?></td>  

            <td><?php echo $incident_date;  ?></td>  

            <td><?php echo $incident_time;  ?></td>  

        </tr>  
        
  </table>
    

  </div>

<!--Footer-part-->

<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_validation.js"></script>
</body>
</html>
