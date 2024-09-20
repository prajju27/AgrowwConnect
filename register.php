<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer_db";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Name = $_POST['farmerName'];
    $Phone = $_POST['phone'];
    $Location = $_POST['location'];
    $Password = $_POST['password'];

    if (!empty($Name) && !empty($Phone) && !empty($Location) && !empty($Password) && !is_numeric($Password)) {
        
        $hashedPassword = password_hash($Password, PASSWORD_BCRYPT);
        
        $stmt = $con->prepare("INSERT INTO register (Name, Phone, Location, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Name, $Phone, $Location, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "Register Successful";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Register Failed";
    }
}
$con->close();
?>
