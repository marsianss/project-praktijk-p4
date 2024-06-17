<?php
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username=?");

$stmt->bind_param("s", $username);

$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $username, $stored_password, $role);
$stmt->store_result();

if ($stmt->fetch()) {
    if ($password == $stored_password) {
        if ($role == 'admin') { // Check if user role is 'admin'
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role; // Store role in session if needed

            header("Location: contactresults.php");
            exit; // Ensure that script stops here
        } else {
            echo "You are not authorized to access this page.";
            header("refresh:3;url=login.php"); // Redirect after 3 seconds
        }
    } else {
        echo "Invalid username or password";
        header("refresh:3;url=login.php"); // Redirect after 3 seconds
    }
} else {
    echo "Invalid username or password";
    header("refresh:3;url=login.php"); // Redirect after 3 seconds
}

$stmt->close();
$conn->close();
?>

