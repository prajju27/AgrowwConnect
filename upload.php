<?php
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "crops_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $photo = $_FILES['photo'];
    // Directory where the uploaded images will be saved
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($photo["tmp_name"]);
    if ($check !== false) {
        // Check file size (e.g., max 5MB)
        if ($photo["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($photo["tmp_name"], $target_file)) {
            // Insert crop details into the database
            $sql = "INSERT INTO crops (name, image_path, price,quantity) VALUES ('$name', '$target_file', '$price')";
            if ($conn->query($sql) === TRUE) {
                // Redirect to the view_crops.php page
                header("Location: view_crops.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

$conn->close();
?>
