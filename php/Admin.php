<style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    background-color: #f5f5f5;
}

h1 {
    color: #333;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    margin: 0; 
    margin-bottom: 1rem; 
}

th {
    background-color: #4cafaf;
    color: white;
    margin: 0; 
    margin-bottom: 1rem; 
}

a {
    color: #4CAF50;
    text-decoration: none;
    margin: 0; 
    margin-bottom: 1rem; 
}

form {
    display: flex;
    flex-direction: column;
    width: 300px;
}

label, input {
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #000000;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;    
}


button {
    padding: 15px 30px;
    background-color: #4cafaf;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 1.2em;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
</style>


<?php
include 'config.php';

// Verwerk het promotie- en degradatieverzoek
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['promote_user_id'])) {
        // Promotie van gebruiker naar admin
        $user_id = $_POST['promote_user_id'];

        $stmt = $conn->prepare("UPDATE users SET role='admin' WHERE id=?");
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            echo "Gebruiker succesvol gepromoveerd tot admin.";
        } else {
            echo "Er is een fout opgetreden bij het promoten van de gebruiker.";
        }

        $stmt->close();

    } elseif (isset($_POST['demote_user_id'])) {
        // Degradatie van admin naar normale gebruiker
        $user_id = $_POST['demote_user_id'];

        $stmt = $conn->prepare("UPDATE users SET role='user' WHERE id=?");
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            echo "Admin privileges succesvol verwijderd voor de gebruiker.";
        } else {
            echo "Er is een fout opgetreden bij het verwijderen van admin privileges.";
        }

        $stmt->close();
    }
}

// Haal de lijst met gebruikers op
$stmt = $conn->prepare("SELECT id, username, role FROM users");
$stmt->execute();
$stmt->bind_result($user_id, $username, $role);

echo "<h2>Adminpagina</h2>";

// Toon de lijst met gebruikers in een tabel met de opties om te promoten en te degraderen
echo "<table border='1'>";
echo "<tr><th>Gebruikersnaam</th><th>Rol</th><th>Acties</th></tr>";
while ($stmt->fetch()) {
    echo "<tr>";
    echo "<td>$username</td>";
    echo "<td>$role</td>";
    echo "<td>";
    if ($role !== 'admin') {
        echo "<form method='post' action='admin.php'>
                <input type='hidden' name='promote_user_id' value='$user_id'>
                <button type='submit'>Promoveer tot Admin</button>
              </form>";
    } else {
        echo "<form method='post' action='admin.php'>
                <input type='hidden' name='demote_user_id' value='$user_id'>
                <button type='submit'>Verwijder Admin Privileges</button>
              </form>";
    }
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

$stmt->close();
$conn->close();
?>
<a href="./aanmeld_results.php">Aanmeld resultaten</a>
<a href="../php/faq-approve.php">FAQ resultaten</a>
<a href="./Admin.php">Users Admin</a>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
?>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
<?php
}
?>
</body>
