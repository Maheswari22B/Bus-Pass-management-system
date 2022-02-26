<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="register.css">
</head>
<body> 
<?php

$connect= mysqli_connect("localhost", "root","","wt-assignment") or die("Connection Failed");

if(!empty($_POST['submit']))
{

$Username=$_POST['Username']; 
$Password=$_POST['Password'];

$query="select * from register where Username='$Username' and Password='$Password'"; 
$result=mysqli_query($connect, $query); 
$count=mysqli_num_rows ($result);

if($count>0)

{ 
  header('location:user.html');
}
else
{
 
  echo "Username and Password does not match!";
}
}



?>


     <div class="wrapper">
         <div class="headline">
             <h1>Welcome</h1>
         </div>
         <form class="form" method="post" >
            <div class="login">
                <div class="form-group">
                    <input type="username" name="Username" placeholder="Username" required="">
                </div>
                                <div class="form-group">
                    
                    <input type="password" name="Password" placeholder="Password" required="">
                </div>
                <input type="submit" name="submit" value="Login"/>

              
                
            </div> 
         </form>
     </div>

    
    <body>
</html>

