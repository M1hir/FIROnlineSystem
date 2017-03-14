<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
    <title>Registration</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
  
</style>  

<body style='background-color:#008c2b'>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Registration</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="registration.php">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Username" name="name" type="text" autofocus>  
                            </div>  
  
                            <div class="form-group">  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                            </div>  
							
								<input name="radio" type="radio" value="police">Police Officer
								<input name="radio" type="radio" value="constable">Constable
							<div class="form-group">  
                                <input class="form-control" placeholder="Station" name="station" type="text" value="">  
                            </div>  	

  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register">  

  
                        </fieldset>  
                    </form>  
                    <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
  
</html>  
  
<?php  
  
include("db_connection.php");//make connection here  
if(isset($_POST['register']))  
{  
    $user_name=$_POST['user_name']; 
    $user_pass=$_POST['user_pass'];  
    $user_email=$_POST['user_email'];  
    $constable = $_POST['radio'];
    $station=$_POST['station'];

    if($user_name=='')  
    {   
        echo"<script>alert('Please enter the name')</script>";  
	exit();
    }  
  
    if($user_pass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	
        exit();
    }  
  
    if($user_email=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
  	exit();  
    }  
	
	if(!isset($_POST['radio']))  
    {  
        echo"<script>alert('Please select constable or police officer ')</script>";  
    	exit();  
    }
	
	if($constable == "Police Officer")
	{
		$constable = "false";
	}
	
	if($constable == "Constable")
	{
		$constable = "true";
	}
    $check_email_query="select * from users WHERE user_email='$user_email'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
   
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";  
exit();  
    } 
    
    $insert_user="insert into users (user_name,user_pass,user_email,constable,station) VALUE ('$user_name','$user_pass','$user_email','$constable','$station')";  
    if(mysqli_query($dbcon,$insert_user))  
    { 
        echo"<script>window.open('login.php','_self')</script>";  
    }  
  
  
  
}  
  
?>      