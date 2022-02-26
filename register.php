<?php

$Username = $_POST['Username'];
$Email  = $_POST['Email'];
$Password = ($_POST['Password']);

if (!empty($Username) || !empty($Email) || !empty($Password))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "wt-assignment";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT Email From register Where Email = ? Limit 1";
  $INSERT = "INSERT Into register (Username,Email,Password )values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $Username,$Email,$Password);
      $stmt->execute();



      echo "<div class='full-height;style=background-color:red'><p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #004436;background-color:pink;'>Registration successfull!</p>";


      
     } else {
      echo "<p style='text-align: center;'><body style='font-size: 30px;font-family: georgia,palatino; color:black;background-color:pink;'>Someone has already registered using this email!</p>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>