<?php
$link = mysqli_connect("localhost","root","","book_turf")
or die("Could not connect".mysqli_error($link));

$sql = "CREATE TABLE IF NOT EXISTS turf(
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
turf_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL ,
  contact_number VARCHAR(255) NOT NULL,
  turf_address VARCHAR(255) NOT NULL,
  timeslot_start DATETIME NOT NULL ,
  timeslot_end DATETIME NOT NULL,
  price VARCHAR(255) NOT NULL,
  refreshments VARCHAR(255) NOT NULL,
  changingRoom VARCHAR(255) NOT NULL,
  size VARCHAR(255) NOT NULL,
  seating VARCHAR(255) NOT NULL,
  booked BOOLEAN NOT NULL DEFAULT '0')";
$results = mysqli_query($link, $sql) or die(mysqli_error($link));

$sql2="CREATE TABLE IF NOT EXISTS turf_user(
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email varchar(255) NOT NULL,
  turf_id int(11) NOT NULL
)";
$results2 = mysqli_query($link, $sql2) or die(mysqli_error($link));
?>