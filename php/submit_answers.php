<?php
include 'config.php';

if (isset($_POST['id']) && isset($_POST['answer'])) {
    $id = $_POST['id'];
    $answer = $_POST['answer'];
    $sql = "UPDATE faq SET Answer='$answer', approved=1 WHERE ID=$id";
    if ($conn->query($sql) === TRUE) {
        echo "FAQ answered and approved successfully";
    } else {
        echo "Error answering and approving FAQ: ". $conn->error;
    }
} else {
    echo "No FAQ ID or answer provided";
}