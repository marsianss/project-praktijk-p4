
<?php
include 'config.php';

$burgerservicenummer = $_GET['burgerservicenummer'];

$sql = "DELETE FROM aanmelden WHERE burgerservicenummer=$burgerservicenummer";

if ($conn->query($sql) === TRUE) {
    echo "deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("Location: aanmeld_results.php");
?>