<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Verbindungsaufbau
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // SQL Query direkt eingebaut, keine Validierung
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Neuer Benutzer hinzugefügt";
    } else {
        echo "Fehler: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "Keine Benutzer gefunden";
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // SQL Query ohne Vorbereitung, direkt in die URL einfügen
    $sql = "DELETE FROM users WHERE id = $delete_id";
    if (mysqli_query($conn, $sql)) {
        echo "Benutzer gelöscht";
    } else {
        echo "Fehler beim Löschen: " . mysqli_error($conn);
    }
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    // Hier könnte beliebige PHP-Datei eingebunden werden
    include("$page.php");
} else {
    echo "Kein Inhalt gewählt!";
}
?>

<form method="POST" action="">
    Name: <input type="text" name="name">
    Email: <input type="text" name="email">
    <input type="submit" value="Absenden">
</form>
