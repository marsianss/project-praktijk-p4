<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "opleidingdb";


$conn = new mysqli($servername, 'root', '', $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=?");

$stmt->bind_param("s", $username);

$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $username, $stored_password);
$stmt->store_result(); 

if ($stmt->fetch()) {
    if ($password == $stored_password) { 
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;

        header("Location: contactresults.php");
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "Invalid username or password";
}

$stmt->close();
$conn->close();
?>