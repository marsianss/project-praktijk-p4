<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $answer = $_POST['answer'];

    $sql = "UPDATE faq SET Answer='$answer', approved=1 WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Answer updated successfully";
    } else {
        echo "Error updating answer: ". $conn->error;
    }

    $conn->close();
} else {
    echo "No data submitted";
}