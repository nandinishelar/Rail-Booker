<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "intercity_express_trains";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$date = $_POST['date'];
$adult = $_POST['adult'];
$child = $_POST['child'];
$total = $_POST['total'];
$number=$_POST['number'];
$code=$_POST['code'];
$dates=$_POST['date'];
$to=$_POST['to'];
$from=$_POST['from'];
$totalamt = $total * 300;
$discount = ((300 * 10 * $child / 100) + (300 * 20 * $adult / 100));
$payable = $totalamt - $discount;
$stmt="insert into ticket(trainid,source,dest,bookdate,jourdate,discount,fare,agentid,commision) values ('$number','$from','$to','$date','$date','$discount','$payable',NULL,NULL)";
$rs=mysqli_query($conn,$stmt);
if ($rs) {
   echo "record inserted successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
} 
echo " <style>
h2 {text-align: center;
padding-top:100px;}
</style><h2>Total payable amount:$payable.Rs.<h2>";
echo "<center><h4>To confirm your ticket pay by clicking following button<h4><center>" . "<br>";
echo "<style> a{
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;;
    text-transform:camelcase;
  }</style><a href='https://easebuzz.in/online-payment-gateway-India/' target='_parent'>Pay now</a>";

// Check connection

//echo "Connected successfully";

// $stmt = $conn->prepare("select * from admin where email_id=?");
// $stmt->bind_param("s", $mail);
// $stmt->execute();
// $stmt_result=$stmt->get_result();
// if($stmt_result->num_rows >0){
//    $data=$stmt_result->fetch_assoc();
//    if($data['password']==$pas && $data['email_id']==$mail) {
//     echo "<h1>login sucessfull<h1>";
// } else {
//     echo "<h1>incorrect id or password<h1> " . "<br>" . $conn->error;
// }}
// else
// echo"<h1>login unsucessfull<h1>";
?>