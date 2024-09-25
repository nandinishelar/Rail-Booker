<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "intercity_express_trains";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $database);
 
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 else
 {
    $to=$_POST['to'];
    $from=$_POST['from'];
    $day=$_POST['day'];
    
  $stmt = $conn->prepare("select train_no,station_code,Date,EAT from train_schedule where 
  route_no in (select route_no from routes where route_name='$from'-'$to') and Date='$day'");
  $stmt->execute();
  $stmt_result=$stmt->get_result();
  //$row=$stmt_result->fetch_assoc();
  $row = $stmt_result->fetch_assoc(); 
   echo "Train number is".$row['train_no']."<br>";
   echo "Ststion code:".$row['station_code']."<br>";
   echo "<b>Date:</b>".$row['Date']."<br>";
   echo "<b>Time:</b>".$row['EAT']."<br>";
   
  //   while ($row = $stmt_result->fetch_assoc()) {
  //     echo $row['route_no']."<br>";
  // }
}
 


?>