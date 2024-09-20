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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Name = $_POST['name'];
    $Phone = $_POST['phone'];
    $Location = $_POST['location'];
    $Password = $_POST['password'];

    if (!empty($Name) && !empty($Phone) && !empty($Location) && !empty($Password) && !is_numeric($Password)) {
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
    } else {
        echo "Register Failed: Please fill all fields and ensure the password is not numeric.";
    }
}

$con->close();
?>
