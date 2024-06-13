
<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM contact WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("Location: contactresults.php");
?>