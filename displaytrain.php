<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body style="margin:50px;">
    <h1>Train Schedule</h1><br>

    <table class="table">
        <thead>
            <tr>
                <th>Train no.</th>
                <th> station code</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
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
            } else {
                $to = $_POST['to'];
                $from = $_POST['from'];
                $day = $_POST['day'];

                $stmt = $conn->prepare("select train_no,station_code,Date,EAT from train_schedule where 
  route_no in (select route_no from routes where route_name='$from'-'$to') and Date='$day'");
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                //$row=$stmt_result->fetch_assoc();
                $row = $stmt_result->fetch_assoc();
                while ($row = $stmt_result->fetch_assoc()) {
                    echo "<form action='booking1.php'> <tr>
    <td name='number'>" . $row['train_no'] . "</td>
   <td name='code'>" . $row['station_code'] . "</td>
   <td name='date'>" . $row['Date'] . "</td>
   <td>" . $row['EAT'] . "</td></tr>
   <td>" . "<a class='btn btn-primary' href='booking.html' target='_parent' role='button'>Book now!!</a>" . "</form>";
                }
                echo "<br>";

                //   while ($row = $stmt_result->fetch_assoc()) {
                //     echo $row['route_no']."<br>";
                // }
            }



            ?>
        </tbody>
    </table>

</body>

</html>