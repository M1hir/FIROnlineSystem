<!DOCTYPE html>

<html lang="en">
<head>
<title>FIR Online</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="js/html2pdf.js"></script>
<script src="js/jspdf.min.js"></script>





</head>
<body>





<!--Header-part-->
<div id="header">
  <h1><a href="login.php">FIR Online</a></h1>
</div>
<!--close-Header-part--> 


<?php
session_start();
include("db_connection.php"); 
 
 if(isset($_POST['mobilesearch']))  
  {  
$var= $_POST['mymobile'];
$check_user2="select * from compaintdb WHERE mobileNo =".$var."";
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
  $fir_date=$rows['fir_date'];
  $time_incident=$rows['time_incident'];
  $description=$rows['description'];
	
   }
  }
?>
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
    <li><a href="login.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li class="submenu active"> <a href="#"><i class="icon icon-list"></i> <span>Forms</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="form-common.php">File FIR</a></li>
        <li><a href="form-validation.php">Issue NOC</a></li>
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
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="login.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">NOC</a> </div>
    <h1>Issue NOC</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>NOC Details</h5>
            <div class="form-actions" style="float: right; margin-top: -15px; background: transparent;">
              <input type="submit" value="Generate PDF" id="clickbait" name="generate">
            </div>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" id="form-me" method="post" action="#" name="form-filled" novalidate="novalidate">
              <<div class="control-group">
              <label class="control-label">Name of Victim :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder=" name" value="<?php if(isset($_POST['mobilesearch'])) echo $cname ?>" />
              </div>
            </div>
            
              
              <div class="control-group">
              <label class="control-label">Email:</label>
              <div class="controls">
                <input type="text" class="span11" name="email" value="<?php if(isset($_POST['mobilesearch'])) echo $email ?>"  placeholder=" Email" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Phone :</label>
              <div class="controls">
                <input type="text" class="span11" name="phone" value="<?php if(isset($_POST['mobilesearch']))  echo $phone ?>" placeholder=" Phone" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text" class="span11" name="address"  placeholder=" Address"  value="<?php if(isset($_POST['mobilesearch']))  echo $address ?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Postal Code</label>
              <div class="controls">
                <input type="text" class="span11" name="postal" value="<?php if(isset($_POST['mobilesearch']))  echo $postCode ?>" placeholder=" Postal Code" />
              </div>
            </div>

              
              <div class="form-actions">
                <input type="submit" name="form-filled" value="Check" class="btn btn-success">
              </div>
            </form>
          </div>
          <div class="span11">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Retrieve</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="mobilesearch" action="form-validation.php" method="post" class="form-horizontal">
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
          
        </div>
      </div>
    </div>
    </div>
  </div>
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





<div id="ReportFIR" style="visibility: hidden; height:0; margin-top: -250px;">

<center>

<h3>Certificate</h3>
</center>

<p> This is to certify that  Mr./Mrs/Ms. <?php echo $cname;?>,
<br> age 20, occupation <?php echo $occupation;?>,
<br> address <?php echo $address;?>,
<br> has personally appeared at the Police Station,
<br> on <?php echo $fir_date;?> at <?php echo $time_incident;?>.
<br><br>The First Information Report filed is as follows:
<br>
<?php echo $description	;?>

</p>
   


</div>





</body>



<script>



(function() {
 var form = $('#ReportFIR'),
  cache_width = form.width(),
  a4 = [595.28, 841.89]; // for a4 size paper width and height

 $('#clickbait').on('click', function() {
  $('body').scrollTop(0);
  
  $('#ReportFIR').css('visibility', 'visible').css('height', 'auto').css('margin-top', '0px');
  createPDF();
  $('#ReportFIR').css('visibility', 'hidden').css('height', '0px').css('margin-top', '-150px');
  
 });
 //create pdf
 function createPDF() {
  getCanvas().then(function(canvas) {
   var
    img = canvas.toDataURL("image/png"),
    doc = new jsPDF({
     unit: 'px',
     format: 'a4'
    });
   doc.addImage(img, 'JPEG', 20, 20);
   doc.save('FIR Report.pdf');
   form.width(cache_width);
  });
 }

 // create canvas object
 function getCanvas() {
  form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
  return html2canvas(form, {
   imageTimeout: 2000,
   removeContainer: true
  });
 }

}());



</script>






</html>
