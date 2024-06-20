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
    background-color: #4cafaf;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}

    </style>
</head>
<body>

<h1>Aanmeldingen</h1>
<?php
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT burgerservicenummer, Email, roepnaam, achternaam, geboortedatum, telefoonnummer FROM aanmelden");

if (!$stmt) {
    echo "Prepare failed: " . $conn->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: " . $stmt->error;
}

$stmt->bind_result($burgerservicenummer, $Email, $roepnaam, $achternaam, $geboortedatum, $telefoonnnummer);

echo "<table><tr>
<th>Burgerservicenummer</th>
<th>Email</th>
<th>Roepnaam</th>
<th>Achternaam</th>
<th>Geboortedatum</th>
<th>Telefoonnummer</th>
<th>Delete</th>
</tr>";
while ($stmt->fetch()) {
    echo "<tr><td>" . $burgerservicenummer . "</td><td>" . $Email . "</td><td>" . $roepnaam . "</td><td>" . $achternaam . "</td><td>" . $geboortedatum . "</td><td>" . $telefoonnnummer . "</td><td><a href='delete_aanmelding.php?burgerservicenummer=" . $burgerservicenummer . "'>Delete</a></td></tr>";
}
echo "</table>";

$stmt->close();
$conn->close();
?>
<a href="../php/faq-approve.php">FAQ resultaten</a>
<a href="../php/contactresults.php">Contact resultaten</a>
<a href="./Admin.php">Users Admin</a>

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