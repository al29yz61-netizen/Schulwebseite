<?php
$host = "localhost";
$user = "root";
$pass = ""; // ggf. anpassen
$db = "schoolbox";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$titel = $_POST['titel'];
$beschreibung = $_POST['beschreibung'];
$preis = $_POST['preis'];
$bild_url = $_POST['bild_url'];
$typ = $_POST['typ'];

$sql = "INSERT INTO artikel (titel, beschreibung, preis, bild_url, typ) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdss", $titel, $beschreibung, $preis, $bild_url, $typ);

if ($stmt->execute()) {
  echo "<p>✅ Artikel erfolgreich hinzugefügt.</p>";
  echo "<a href='artikel_add.html'>Zurück</a>";
} else {
  echo "<p>❌ Fehler: " . $stmt->error . "</p>";
}

$stmt->close();
$conn->close();
?>
