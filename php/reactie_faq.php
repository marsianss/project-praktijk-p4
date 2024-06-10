<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE faq SET approved=1 WHERE ID=$id";
    if ($conn->query($sql) === TRUE) {
        echo "FAQ approved successfully";
    } else {
        echo "Error approving FAQ: ". $conn->error;
    }
} else {
    echo "No FAQ ID provided";
}