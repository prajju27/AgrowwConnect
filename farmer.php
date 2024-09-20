<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Login</title>
    <link rel="stylesheet" href="style.css">
    <style>  
        body{
            background-image:url("cus.jpeg");
            background-repeat: repeat-x;
            background-size: 220%;
            padding: 0%;
        }
        header{
            background-color: rgb(157, 236, 236);
        }
        section {
            background-color: rgb(245, 245, 217);
        }
        form{
            font-size: 100%;
            width: 300px;
            margin: auto;
        }
        form label{
            display: flex;
            margin-top: 20px;
        }
        header{
            font-size: 120%;
        }
        input{
            width: 100%;
            padding: 3px;
            border:1px solid rgb(18, 16, 16);
        }
        input[type="submit"]{
            width: 100px;
            height: 35px;
            margin-top: 20px;
            border: none;
            background-color: #ff7200;
            color:white;
            font-size: 18px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: rgb(41, 160, 160);
            color: aquamarine;
        }
    </style>
</head>
<body>
    
    <header>
        <h1>Farmer Login</h1>
    </header>
    <section>
        <form id="farmerLoginForm" method="post">
            <label for="farmerName">Name :</label>
            <input type="text" id="farmerName" name="farmerName" required>
            <label for="phone">Phone :</label>
            <input type="text" id="phone" name="phone" required>
            <label for="location">Location :</label>
            <input type="text" id="location" name="location" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required><br>
            <input type="Submit" name="" value="Submit"/>
        </form>
    </section>
    <script src="script.js"></script>
</body>
</html>
