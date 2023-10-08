<?php

$db = new PDO('mysql:host=localhost;dbname=carpool', 'root', '');

$destination = $_REQUEST['Destination'];

$sql = "SELECT * FROM rides WHERE Destination = :destination AND flag = 1";
$stmt = $db->prepare($sql);
$stmt->bindParam(':destination', $destination);
$stmt->execute();
$ridenum=1;

$rides = $stmt->fetchAll();
//echo 'Rides Unavailable at the moment!!';
foreach ($rides as $ride) {
    if($ride['SeatsAvailable']>0){
        echo '<div style="text-align:left;font-size: 25px;">';
        echo '<h2>' .$ridenum . ')' .  $ride['StartingPoint'] . ' to ' . $ride['Destination'] . '</h2>';
        echo '<p>Date and time: ' . $ride['DateAndTime'] . '</p>';
        echo '<p>Seats available: ' . $ride['SeatsAvailable'] . '</p>';
        echo '<p>Ride ID:' . $ride['rid'] . '</p>';
    } else{
        echo'<h1>Ride Filled</h1>';
    }
    if ($destination == $ride['Destination']) {
        echo '<form method="post" action="book_ride.php">';
        echo '<input type="hidden" name="ride_id" value="' . $ride['rid'] . '">'; 
        echo '<input type="submit" value="Book Ride">';
        echo '</form>';
    } else {
        echo '<h1 style="text-align:center;">No Rides Found </h1>';
    }

    echo '</div>';
    $ridenum=$ridenum+1;
}
echo'<h1 style="text-align:center;color:red">No More Rides!</h1>';

$db = null;

?>
