<?php
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$naam = $_POST['naam'];
$email = $_POST['email'];
$bericht = $_POST['bericht'];

$stmt = $conn->prepare("INSERT INTO contact (Name, Email, Message) VALUES (?, ?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sss", $naam, $email, $bericht);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
} else {
    echo "<div class='success'>Dankjewel! We nemen zo snel mogelijk contact met u op.</div>";

    header('Refresh: 3.5; url=../html/contact.html');
}

$stmt->close();
$conn->close();
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
