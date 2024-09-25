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
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $repass=$_POST['repass'];
    if($pass!=$repass)
    {
        echo"<h2>Password not entered correct<h2>";
    }
    else{
  $stmt = "update user set passwd='$pass' WHERE emailid='$user'";
  $rs=mysqli_query($conn,$stmt);
//   $stmt_result=$stmt->get_result();
//   //$row=$stmt_result->fetch_assoc();
//   $row = $stmt_result->fetch_assoc(); 
   if($rs)
   {
    echo"<br>change sucessfully";
   }
   else
   echo"<br>something went wrong";
    }
}
 


?>