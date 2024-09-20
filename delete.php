<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farm_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$crop_id = $_POST['crop_id'];

$sql = "SELECT photo FROM crops WHERE id = $crop_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $photo = $row['photo'];

    if (unlink($photo)) {
        $sql = "DELETE FROM crops WHERE id = $crop_id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.html");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Error deleting file: " . $photo;
    }
} else {
    echo "No record found";
}

$conn->close();
?>
