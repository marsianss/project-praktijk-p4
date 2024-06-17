<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password']; // Wachtwoord niet hashen

    // Controleer of de gebruikersnaam al bestaat
    $stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Gebruikersnaam bestaat al
        header("Refresh: 3; url=Acountmaken.php");
        echo "Gebruikersnaam bestaat al. Je wordt doorgestuurd naar account aanmaken...";
        exit();
    } else {
        // Voeg de nieuwe gebruiker toe
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            header("Refresh: 3; url=login.php");
            echo "Registratie succesvol. Je wordt doorgestuurd naar de login pagina...";
            exit();
        } else {
            // Er is een fout opgetreden, stuur terug naar de registratiepagina met een foutmelding
            header("Location: Acountmaken.php?error=failed");
            exit();
        }
    }

    $stmt->close();
    $conn->close();
} else {
    // Ongeldige aanvraagmethode, stuur terug naar de registratiepagina
    header("Location: register.php?error=invalid");
    exit();
}
?>
