<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "opleidingdb";

$conn = new mysqli($servername, 'root', '', $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>