<?php
$db = new PDO('mysql:host=localhost;dbname=carpool', 'root', '');
$rid = $_REQUEST['ride_id'];

$sql = "SELECT PhoneNumber FROM rides WHERE rid = $rid";
$result = $db->query($sql);

if ($result) {
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $phoneNumber = $row['PhoneNumber'];
    echo '<h1 style="text-align:center;margin-top:40px;">Phone Number associated with Ride is ' . $phoneNumber . '</h1>';
} else {
    echo '<marquee><h1>Error Occurred!!</h1></marquee>';
}


$query = "UPDATE rides SET SeatsAvailable = SeatsAvailable - 1 WHERE rid = $rid";
$db->query($query);
$db = null; 
?>
