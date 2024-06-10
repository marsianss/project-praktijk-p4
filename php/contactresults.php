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
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
    <th>Delete</th>
    </tr>";
    while ($stmt->fetch()) {
        echo "<tr><td>" . $id . "</td><td>" . $name . "</td><td>" . $email . "</td><td>" . $message . "</td><td>" . $created_at . "</td><td><a href='delete_contact.php?id=" . $id . "'>Delete</a></td></tr>";
    }
    echo "</table>";

    $stmt->close();
    $conn->close();
    ?>


<h1>Aanmeldingen</h1>
    <?php
include 'config.php';


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("SELECT burgerservicenummer, Email, roepnaam, geboortedatum, telefoonnummer FROM aanmelden");


    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
    }


    if (!$stmt->execute()) {
        echo "Execute failed: " . $stmt->error;
    }

 
    $stmt->bind_result($burgerservicenummer, $Email, $roepnaam, $geboortedatum, $telefoonnnummer);

  
    echo "<table><tr
    ><th>Burgerservicenummer</th>
    <th>Email</th>
    <th>Roepnaam</th>
    <th>Geboortedatum</th>
    <th>Telefoonnummer</th>
    <th>Delete</th>
    </tr>";
    while ($stmt->fetch()) {
        echo "<tr><td>" . $burgerservicenummer . "</td><td>" . $Email . "</td><td>" . $roepnaam . "</td><td>" . $geboortedatum . "</td><td>" . $telefoonnnummer . "</td><td><a href='delete_aanmelding.php?burgerservicenummer=" . $burgerservicenummer . "'>Delete</a></td></tr>";
    }
    echo "</table>";
    

    $stmt->close();
    $conn->close();
    ?>


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