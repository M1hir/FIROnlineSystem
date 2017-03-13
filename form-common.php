<!DOCTYPE html>
<?php
session_start();
include("db_connection.php"); 
$check_user2="select station from users WHERE user_email ='".$_SESSION['email']."'";
    $run=mysqli_query($dbcon,$check_user2);  
$rows=mysqli_fetch_array($run);
  $station = $rows['station'];
  $phone='';
  $address='';
  $gender='';
  $age='';
  $email='';
  $postCode='';
  $cname='';
  $occupation='';
 if(isset($_POST['mobilesearch']))  
  {  
$check_user2="select * from compaintdb WHERE mobileNo ='".$_POST['mymobile']."'";
    $run=mysqli_query($dbcon,$check_user2);  
 if(mysqli_num_rows($run)>0)  
    { 
 $rows=mysqli_fetch_array($run);
  $phone=$rows['mobileNo'];
  $address=$rows['address'];
  $email=$rows['emailId'];
  $postCode=$rows['postCode'];
  $cname=$rows['compName'];
  $occupation=$rows['occupation'];
   }
  }  
?>

<?php

if(isset($_POST['form-filled']))  
{  
    $station=$_POST['stationname'] . ""; 
    $subject=$_POST['subject'] . ""; 
    $type=$_POST['type'] . ""; 
    $name=$_POST['name'] . ""; 
    $address=$_POST['address'] . ""; 
    
    $postal=$_POST['postal'] . ""; 
    $phone=$_POST['phone'] . ""; 
    $gender=$_POST['gender'] . ""; 
    $age=$_POST['age'] . ""; 
    $email=$_POST['email'] . ""; 
    $complaint=$_POST['complaint'] . "";  
    $place=$_POST['place'] . "";
    $occupation=$_POST['occupation'.""] ."";

    $description=$_POST['description'] . "";
    $incident_date=$_POST['fir_date'] . "";

    $incident_time=$_POST['time_incident'] . "";

    $statusid=$_POST['statusid'] . "";

    $comments=$_POST['comments'] . "";
  

    $insert_user="insert into compaintdb(stationname, subject, type, complaint, compName, address, postCode, mobileNo, gender, age, emailId, place,occupation,description,fir_date,time_incident,statusid,comments) values('$station', '$subject', '$type', '$complaint', '$name', '$address', '$postal', '$phone',  '$gender',  '$age', '$email', '$place','$occupation','$description',' $incident_date',' $incident_time', '$statusid',' $comments')"; 
    $run=mysqli_query($dbcon,$insert_user);
}
?> 


<html lang="en">
<head>
<title>FIR online</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="#">FIR Online</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  id="profile-messages" ><a title="" href="#"  data-target="#profile-messages" ><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      
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
    <li><a href="login.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="charts.html"><i class="icon icon-signal"></i> <span>Current Graphs</span></a> </li>
    <li class="submenu active"> <a href="#"><i class="icon icon-list"></i> <span>Forms</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="form-common.php">File FIR</a></li>
        <li><a href="form-validation.php">Issue NOC</a></li>

       
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>TOOLS</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="calendar.html">Calendar</a></li>
        
        <li><a href="chat.html">Chat Box</a></li>
      </ul>
    </li>
    </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="login.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">File FIR</a>  </div>
  <h1>File FIR</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form role="form" method="POST" action="form-common.php" class="form-horizontal">
           <div class="control-group">

              <label class="control-label">Station :</label>
              <div class="controls">
                <input type="text" name="stationname" class="span11" value="<?php echo $station ?>" />
              </div>  
            </div>
          <!--
           <div class="control-group">
              <label class="control-label">Select City</label>
              <div class="controls">
                <select id="city"  name="city" >
                 <option value="a">Select</option>S
                 <option value="mumbai">Mumbai</option>
                 <option value="delhi">Delhi</option>
                 <option value="thane">Thane</option>
                 <option value="bangalore">Bangalore</option>
                 <option value="kolkata">Kolkata</option>
               </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" >Select Station</label>
              <div class="controls">
                <select id="station" name="station">
                <option value="a">Select</option>
                <option value="andheri">Andheri</option>
                <option value="borivali">Borivali</option>
                <option value="matunga">Matunga</option>
                <option value="powai">Powai</option>
                <option value="thane">Thane</option>
            <option value="vashi">Vashi</option>
            </select>
              </div>
            </div>
            -->
            
            <div class="control-group">

              <label class="control-label">Subject :</label>
              <div class="controls">
                <input type="text" name="subject" class="span11" placeholder="Subject" />
              </div>  
            </div>
            <div class="control-group">
              <label class="control-label">Select input</label>
              <div class="controls">
                <select id="type" name="type" >
                  <option value="robbery" name="robbery">Robbery</option>
                  <option value="lost" name="lost">Lost</option>
                  <option value="kidnap" name="kidnap">Kindapping</option>
                  <option value="rape" name="rape">Rape</option>
                  <option value="assault" name="assault">Assualt</option>
                  <option value="homicide" name="homicide" >Homicide</option>
                  <option value="theft" name="theft">Theft</option>
                  <option value="violence" name="violence">Domestic Violence</option>

                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Name of Victim :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder=" name" value="<?php echo $cname ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text" class="span11" name="address"  placeholder=" Address"  value="<?php echo $address ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Postal Code</label>
              <div class="controls">
                <input type="text" class="span11" name="postal" value="<?php echo $postCode ?>" placeholder=" Postal Code" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Phone :</label>
              <div class="controls">
                <input type="text" class="span11" name="phone" value="<?php echo $phone ?>" placeholder=" Phone" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Gender :</label>
              <div class="controls">
                <input type="text" class="span11" name="gender" value="<?php echo $gender ?>" placeholder=" Gender" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Age :</label>
              <div class="controls">
                <input type="text" class="span11" name="age" value="<?php echo $age ?>" placeholder=" Age" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email:</label>
              <div class="controls">
                <input type="text" class="span11" name="email" value="<?php echo $email ?>"  placeholder=" Email" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Occupation/Profession:</label>
              <div class="controls">
                <input type="text" class="span11" name="occupation"  placeholder=" occupation" value="<?php echo $occupation ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Complaint:</label>
              <div class="controls">
                <input type="text" class="span11" name="complaint"  placeholder=" Complaint" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Place of Incident :</label>
              <div class="controls">
                <input type="text" class="span11" name="place"  placeholder=" Place" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date picker (dd-mm)</label>
              <div class="controls">
                <input type="text" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="01-02-2013" name="fir_date" class="datepicker span11">
                <span class="help-block">Date with Formate of  (dd-mm-yy)</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Time:</label>
              <div class="controls">
                <input type="text" class="span11" name="time_incident"  placeholder=" Time (HHMM)" />
                <span class="help-block">Time with Formate of  (hh:mm)</span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Description field:</label>
              <div class="controls">
                <input type="text" name="description" class="span11" />
                <span class="help-block">Description field</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Comment Box</label>
              <div class="controls">
               <input type="text" name="comments" class="span11" />

              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status Box</label>
              <div class="controls">
               <input type="text" name="statusid" class="span11" />

              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="form-filled" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
<div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Retrieve</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="mobilesearch" action="form-common.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Phone field</label>
              <div class="controls">
                <input type="text" name="mymobile"  class="span8 mask text">
            </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="mobilesearch">
            </div>
            </form>
            </div>
            </div>
            </div>
          
   

<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>


