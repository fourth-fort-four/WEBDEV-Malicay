<?php
//to access database on web goto auth-db605.hstgr.io

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malicay";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
	die("Connection Failed : " . $conn->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM names WHERE usernames ='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<script>alert('Logged in succesfully. Welcome $username');</script>";
    }
} else {
    echo "<script>alert('Wrong password');</script>";
    echo "<script>window.location.href('index.html');</script>";
}


$conn->close();