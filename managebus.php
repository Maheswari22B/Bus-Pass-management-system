<?php

$Bus_no = $_POST['Bus_no'];
$Seats_available  = $_POST['Seats_available'];
$No_of_stops = ($_POST['No_of_stops']);
$Startingstop = ($_POST['Starting_stop']);
$Destination = ($_POST['Destination']);

if (!empty($Bus_no) || !empty($Seats_available) || !empty($No_of_stops) || !empty($Starting_stop) || !empty($Destination))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "wt-assignment";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .')'
    . mysqli_connect_error());
}
else{
    $SELECT = "SELECT Bus_no From managebus Where Bus_no = ? Limit 1";
    $INSERT = "INSERT Into managebus (Bus_no,Seats_available,No_of_stops,Starting_stop,Destination) values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$Bus_no);
     $stmt->execute();
     $stmt->bind_result($Bus_no);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("siiss",$Bus_no,$Seats_available,$No_of_stops,$Starting_stop,$Destination);
      $stmt->execute();

      echo "<div class='full-height;style=background-color:red'><p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #004436;background-color:pink;'>Bus details updated!</p>";


      
     } else {
      echo "<p style='text-align: center;'><body style='font-size: 30px;font-family: georgia,palatino; color: black;background-color:pink;'>Already updated!</p>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>