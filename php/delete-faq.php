<?php
include 'config.php';

$id = $_GET['ID'];

$sql = "DELETE FROM faq WHERE ID=$id";

if ($conn->query($sql) === TRUE) {
    echo "FAQ deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("Location: faq-approve.php");
?>
