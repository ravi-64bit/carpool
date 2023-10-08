<?php
$db=new mysqli("localhost","root","","carpool");
$rid=$_REQUEST['rid'];
$phnno=$_REQUEST['PhoneNumber'];

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql="UPDATE rides SET flag = 0 WHERE rid=$rid and PhoneNumber=$phnno";

if ($db->query($sql) === TRUE) {
    echo "<marquee><h1>Ride deleted succesfully</h1></marquee>";
} else {
    echo "<h1>We cannot delete your ride</h1>";
}
?>