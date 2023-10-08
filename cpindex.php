<?php
  $db=new mysqli("localhost","root","","carpool");
  $sql="select max(rid) from rides";
  $res=$db->query($sql);
  if ($res) {
    $row = $res->fetch_assoc();  
    $maxRideId = $row['max(rid)']; 
    $db->close();
  } else {
    $maxRideId = "N/A"; 
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="icon.png" type="image/x-icon">
  <title>SmartCarPool</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <header>
    <div style="text-align:center;">
      <h1 style="font-size:80px; ">SmartCarPool<a href="rickroll.html"><span>🚌</span></a></h1>
      <nav>
        <a href="cpindex.html">Home &emsp; |</a>
        <a href="find_ride.html">Find a Ride &emsp; |</a>
        <a href="create_ride.html">Create a Ride &emsp; |</a>
        <a href="about.html">About</a>
      </nav>
    </div>
  </header>
  <main>  
    <b><marquee style="font-family:'cascadia mono';color: red; font-size:30px" scrollamount="12"></b>
      Total rides created using SmartCarPool :<?php echo $maxRideId; ?>
    </marquee>
    <h2>Find a Ride</h2>
    <form action="find_ride.php" method="post">
      <input type="text" name="Destination" placeholder="Enter your destination">
      <input type="submit" value="Find Rides">
    </form>
    
    <h2>Create a Ride</h2>
    <form method="POST" action="create_ride.php">
    <input type="text" name="StartingPoint" placeholder="Enter Starting Point">
    <input type="text" name="Destination" placeholder="Enter Destination">
    <input type="datetime-local" name="DateAndTime" placeholder="Select Date and Time">
    <input type="number" name="SeatsAvailable" placeholder="Enter Seats Available">
    <input type="tel" name="PhoneNumber" placeholder="Enter Phone Number">
    <input type="submit" value="Create Ride">
    </form>
    
    <h2>Delete a ride</h2>
    <form method="post" action="delete_ride.php">
      <input type="number" name="rid" placeholder="Enter your Ride ID">
      <input type="tel" name="PhoneNumber" placeholder="Enter Phone Number">
      <input type="submit" value="Delete Ride">
    </form>

  </main>
  <footer>
    <a href='index.html'><p style="font-size:30px; color:white">Visit our Trip Advisor page</p></a>
  </footer>
</body>
</html>
