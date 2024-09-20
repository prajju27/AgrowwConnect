<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Crops</title>
    <style>
        body {
            background-image: url("cu1.jpeg");
            background-size: cover;
            background-repeat: repeat-x;
            padding: 5px;
            text-align: center;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>Available Crops</header>
    <section>
        <table>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Nursery</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "crops_database");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT crops1.name, crops1.photo, crops1.price, crops1.quantity, nurseries1.name AS nursery_name FROM crops1 JOIN nurseries1 ON crops1.nursery_id = nurseries1.id";
            $result = $conn->query($sql);
           while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td><img src='{$row['photo']}' width='100'><br>{$row['photo']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['nursery_name']}</td>
                    </tr>";
           }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td><img src='{$row['photo']}' width='100'><br>{$row['photo']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['nursery_name']}</td>
                    </tr>";
            }
            $conn->close();
            ?>
        </table>
    </section>
</body>
</html>
