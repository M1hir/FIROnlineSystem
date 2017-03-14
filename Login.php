<?php  
session_start();
  
?>  
  
  
  
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
    <title>Login</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
  
</style>  
  
<body style='background-color:#2E363F'> 
  
 /* 
<div class="container">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Sign In</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="login.php">  
                        <fieldset>  
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                            </div>  
  
  
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login" >  
  
                            <!-- Change this to a button or input when using this as a form -->  
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
            </div>  
        </div>  
    </div>  
  //    
      
    </body>  
  
</html>  
  
<?php  
  
include("db_connection.php");  
if(isset($_POST['login']))  
{  
    $user_email=$_POST['email'];  
    $user_pass=$_POST['pass'];
    
    $check_user="select constable from users WHERE user_email = '$user_email' AND user_pass = '$user_pass'";  
  
    $run=mysqli_query($dbcon,$check_user);  
  
	$constable = "";
    if(mysqli_num_rows($run))  
    {  
	while($rows = mysqli_fetch_array($run)){
		echo $row['constable'];
	$constable = $rows['constable'];	
	}
	
	if($constable == "constable")
	{
	echo "<script>window.open('constabledash.html','_self')</script>"; 
	}
	else if($constable == "police")
	{
        echo "<script>window.open('indexedit2.html','_self')</script>";     
	}
  
        $_SESSION['email']=$user_email;
        $_SESSION['pass']=$user_pass;
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}  
?>  