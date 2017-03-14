<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <title>View Users</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
  
    }  
  
</style>  
  
<body>  
  
<div class="table-scrol">  
    <h3 align="center">All the Users</h3>  
  
<div class="table-responsive"> 
  
  
    <table border="4 "class="table table-bordered table-hover table-striped">  
        <thead>  
  
        <tr>  
  
            <th>User Id</th>  
            <th>User Name</th>  
	     <th>User Pass</th>            
  	     <th>User E-mail</th>  
	    <th>Police type</th>
            <th>Delete User</th>  
        </tr>  
        </thead>  
  
        <?php  
        include("db_connection.php");  
        $view_users_query="select * from users"; 
        $run=mysqli_query($dbcon,$view_users_query);
        while($row=mysqli_fetch_array($run))
        {  
            $user_id=$row[0];  
            $user_name=$row[1];  
            $user_email=$row[3];  
            $user_pass=$row[2];  
            $constable=$row[4];
  
  
        ?>  
  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $user_id;  ?></td>  
            <td><?php echo $user_name;  ?></td> 
            <td><?php echo $user_pass;  ?></td>   
            <td><?php echo $user_email;  ?></td>  
	     <td><?php echo $constable;  ?></td> 
            <td><a href="delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td>  
        </tr>  
  
        <?php } ?>  
  
    </table>  
        </div>  
</div>  
  
  
</body>  
  
</html>  