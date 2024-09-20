<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer_db";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$Name = "Test Name";
$Phone = "1234567890";
$Location = "Test Location";
$Password = "TestPassword";
$hashedPassword = password_hash($Password, PASSWORD_BCRYPT);

$stmt = $con->prepare("INSERT INTO register (Name, Phone, Location, Password) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    echo "Prepare failed: (" . $con->errno . ") " . $con->error;
    exit();
}
$stmt->bind_param("ssss", $Name, $Phone, $Location, $hashedPassword);

if ($stmt->execute()) {
    echo "Insert Successful";
} else {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->close();
$con->close();
?>
