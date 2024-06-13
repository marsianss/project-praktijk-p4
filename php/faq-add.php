<?php
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$naam = $_POST['naam'];
$email = $_POST['email'];
$bericht = $_POST['bericht'];

$stmt = $conn->prepare("INSERT INTO faq (Name, Email, Message) VALUES (?, ?, ?)");

if (!$stmt) {
    echo "Prepare failed: " . $conn->error;
}

$stmt->bind_param("sss", $naam, $email, $bericht);

if (!$stmt->execute()) {
    echo "Execute failed: " . $stmt->error;
} else {
    echo "<div class='success'>Dankjewel! Na goedkeuring zullen wij uw vraag beantwoorden.</div>";
}

$stmt->close();
$conn->close();

header('Refresh: 3.5; url=../html/FAQ.php');
?>

<style>
.success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    color: #155724;
    font-size: 1.2rem;
    margin: 1rem 0;
    padding: 0.5rem 1rem;
}
</style>