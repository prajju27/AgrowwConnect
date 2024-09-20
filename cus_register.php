<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cus_database";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Name = $_POST['customerName'];
    $Location = $_POST['location'];
    $Phone = $_POST['phonenumber'];

    if (!empty($Name) && !empty($Location) && !empty($Phone )) {
        $stmt = $con->prepare("INSERT INTO register1 (Name,Location, Phone) VALUES (?, ?, ?)");
        if (!$stmt) {
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
            exit();
        }
        $stmt->bind_param("sss", $Name,$Location, $Phone);

        if ($stmt->execute()) {
            echo "Successfully Registerd!";
            echo"Thank You!";
        }
        else {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Register Failed: Please fill all fields and ensure the password is not numeric.";
    }
}
$con->close();
?>