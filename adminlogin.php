<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="intercity_express_trains";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$mail =  $_POST['email'];
$pas = $_POST['pass'];
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$stmt = $conn->prepare("select * from admin where email_id=?");
$stmt->bind_param("s", $mail);
$stmt->execute();
$stmt_result=$stmt->get_result();
if($stmt_result->num_rows >0){
   $data=$stmt_result->fetch_assoc();
   if($data['password']==$pas && $data['email_id']==$mail) {
    echo "<h1>login sucessfull<h1>";
} else {
    echo "<h1>incorrect id or password<h1> " . "<br>" . $conn->error;
}}
else
echo"<h1>login unsucessfull<h1>";
?> 