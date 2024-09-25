<?php
$number=$_POST['number'];
$code=$_POST['code'];
$date=$_POST['date'];
echo"
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Railway Ticket Booking</title>
    <link rel='stylesheet' href='booking.css'>
</head>
<body>
    <div class='container'>
        <h1>Book your ticket </h1>
        <form action='booking.php' method='POST'>
            <div>
            <label for='from'>From:</label>
            <input type='text' id='from' name='from' placeholder='source' required>
        </div>
        <div>
            <label for='to'>To:</label>
            <input type='text' id='to' name='to' placeholder='destination' required>
        </div>
            <div>
            <label for='date'>Date:</label>
            <input type='date' id='date' name='date' required>
        </div> 
        <div> 
            <label for='ticketnumber'>Adults :</label>
            <input type='number' name='adult' id='ticket_number' placeholder=' (put 0 if no adult)' required>
        </div>
        <div> 
            <label for='ticketnumber'>Children:</label>
            <input type='number' name='child' id='ticket_number' placeholder=' (put 0 if no children)' required>
        </div>
        <div> 
            <label for='ticketnumber'> Total No. of Tickets :</label>
            <input type='number' name='total' id='ticket_number' placeholder='number of tickets' required>
        </div>
        <div>
            <label for='to'>Are you agent?</label>
            <input type='text' id='to' name='agent' placeholder='put yes if you are otherwise ignore '>
        </div>
            <button type='submit'>Book Now</button>
        </form>
    </div>
</body>
</html>";
?>