<?php

$mysqli = new mysqli("localhost", "root", "", "carpool");

$startingPoint = $_REQUEST['StartingPoint'];
$destination = $_REQUEST['Destination'];
$dateTime = $_REQUEST['DateAndTime'];
$seatsAvailable = $_REQUEST['SeatsAvailable'];
$phoneNumber = $_REQUEST['PhoneNumber'];


if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}


$sql = "INSERT INTO rides (StartingPoint, Destination, DateAndTime, SeatsAvailable, PhoneNumber) VALUES('$startingPoint', '$destination', '$dateTime', '$seatsAvailable', '$phoneNumber')";

if ($mysqli->query($sql) === TRUE) {
  $lastInsertedID = $mysqli->insert_id;
  echo"<marquee><h1>Success 👍</h1></marquee>";
  echo'<div style="text-align:center;">';
  echo '<h2>Please note your Ride ID:' . $lastInsertedID . '</h2>';
  
}
else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}


$mysqli->close();
?>
