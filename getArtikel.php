getArtikel.php
<?php
$host = 'localhost';
$db   = 'schoolbox';
$user = 'root';        // oder dein Benutzername
$pass = '';            // oder dein Passwort
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
  $stmt = $pdo->query("SELECT * FROM artikel");
  echo json_encode($stmt->fetchAll());
} catch (\PDOException $e) {
  http_response_code(500);
  echo json_encode(['error' => 'Datenbankfehler']);
}
?>
