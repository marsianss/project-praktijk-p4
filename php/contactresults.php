<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Results</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    background-color: #f5f5f5;
}

h1 {
    color: #333;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    margin: 0; 
    margin-bottom: 1rem; 
}

th {
    background-color: #4cafaf;
    color: white;
    margin: 0; 
    margin-bottom: 1rem; 
}

a {
    color: #4CAF50;
    text-decoration: none;
    margin: 0; 
    margin-bottom: 1rem; 
}

form {
    display: flex;
    flex-direction: column;
    width: 300px;
}

label, input {
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #000000;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <h1>Contact resultaten</h1>
    <?php
include 'config.php';


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("SELECT id, Name, Email, Message, created_at FROM contact ORDER BY created_at DESC");


    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
    }


    if (!$stmt->execute()) {
        echo "Execute failed: " . $stmt->error;
    }

 
    $stmt->bind_result($id, $name, $email, $message, $created_at);

  
    echo "<table><tr
    ><th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date/Time</th>
    <th>Verwijder</th>
    </tr>";
    while ($stmt->fetch()) {
        echo "<tr><td>" . $id . "</td><td>" . $name . "</td><td>" . $email . "</td><td>" . $message . "</td><td>" . $created_at . "</td><td><a href='delete_contact.php?id=" . $id . "'>Verwijder</a></td></tr>";
    }
    echo "</table>";

    $stmt->close();
    $conn->close();
    ?>


<a href="./aanmeld_results.php">Aanmeld resultaten</a>
    
<a href="../php/faq-approve.php">FAQ resultaten</a>

<a href="./Admin.php">Users Promotie</a>

     <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    ?>
        <form action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form>
    <?php
    }
    ?>
</body>
</html>