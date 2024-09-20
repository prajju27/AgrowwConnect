<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cus_database";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Name = $_POST['customerName'];
    $Phone = $_POST['phonenumber'];

    if (!empty($Name) && !empty($Phone)) {
        $stmt = $con->prepare("SELECT Phone FROM register1 WHERE Name = ?");
        if (!$stmt) {
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
            exit();
        }
        $stmt->bind_param("s", $Name);
        
        // Execute the statement
        $stmt->execute();
        
        // Bind result variables
        $stmt->bind_result($dbPhone);

        // Fetch the result
        if ($stmt->fetch()) {
            // Compare the fetched phone number with the input phone number
            if ($dbPhone == $Phone) {
                echo "Login Successful! Welcome, $Name!";
                header("Location: view_crops.php");
            } else {
                echo "Login Failed: Invalid Name or Phone number.";
            }
        } else {
            echo "Login Failed: No user found with this Name.";
        }

        $stmt->close();
    } else {
        echo "Login Failed: Please fill all fields.";
    }
}

$con->close();
?>
