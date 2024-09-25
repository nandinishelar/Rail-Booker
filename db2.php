<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="intercity_express_trains";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email =  $_POST['email'];
//echo 'email: '.$email;
        $pass = $_POST['pass'];
$sqlquery = "INSERT INTO user VALUES 
    ( '$email','$pass')";
 $rs=mysqli_query($conn,$sqlquery);
 if ($rs) {
    echo "<html><style> .closebtn:hover {
      color: black;}
      body{
        margin-top: 100px;
        margin-bottom: 100px;
        margin-right: 150px;
        margin-left: 80px;
      }
      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        
        font-size: 40px;
        line-height: 40px;
        cursor: pointer;
        transition: 0.3s;
      }.alert.success {background-color: #04AA6D;
      font-size: 40px;}</style>
      <body>
      <div class='alert success'>
    <span class='closebtn'>&times;</span>  
    <strong>Success!</strong>you have successfully registered.
  </div>
  <script>
var close = document.getElementsByClassName('closebtn');
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = '0';
    setTimeout(function(){ div.style.display = 'none'; }, 600);
  }
}
</script>
</body>
</html>
";  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?> 