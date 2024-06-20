<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FAQ</title>
</head>
<body>
    <h1>FAQ</h1>
    <?php
include 'config.php';

$sql = "SELECT * FROM faq WHERE approved=0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Vraag</th><th>Antwoord</th><th>Datum</th><th>Delete</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row['ID']. "</td>";
        echo "<td>". $row['Message']. "</td>";
        echo "<td>";
        echo "<form action='answer_faq.php' method='post'>";
        echo "<input type='hidden' name='id' value='". $row['ID']. "'>";
        echo "<input type='text' name='answer' required>";
        echo "<input type='submit' value='Answer'>";
        echo "</form>";
        echo "</td>";
        echo "<td>". $row['created_at']. "</td>";
        echo "<td><a href='delete-faq.php?ID=". $row['ID']. "'>Verwijder</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No FAQs to approve";
}
?>
        
    </table>
    <br><br><br>
    <a href="./aanmeld_results.php">Aanmeld resultaten</a>
    <a href="../php/contactresults.php">Contact resultaten</a>
    <a href="../php/Admin.php">Users Admin</a>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    ?>
        <form action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form>
    <?php
    }
    ?>
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
    max-width: 50px;
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
</body>
</html>
