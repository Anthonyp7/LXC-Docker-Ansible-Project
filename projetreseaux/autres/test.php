<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "projetreseaux");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$r =  "SELECT * FROM users;";
$res = mysqli_query($conn, $r);

$l = mysqli_fetch_assoc($res);
echo $l["login"];
