<?php
$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'appdb';
$user = getenv('DB_USER') ?: 'appuser';
$pass = getenv('DB_PASSWORD') ?: 'apppass';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // Crea una tabla de ejemplo la primera vez que se ejecuta
    $pdo->exec("CREATE TABLE IF NOT EXISTS visitas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fecha DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    $pdo->exec("INSERT INTO visitas () VALUES ()");

    $total = $pdo->query("SELECT COUNT(*) FROM visitas")->fetchColumn();

    $mensaje = "Conexión a MySQL correcta. Visitas registradas: $total";
} catch (PDOException $e) {
    $mensaje = "Error de conexión: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Stack Docker: nginx + PHP + MySQL</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 600px; margin: 4rem auto; padding: 0 1rem; }
        .box { padding: 1.5rem; border-radius: 8px; background: #f4f4f8; border: 1px solid #ddd; }
        h1 { font-size: 1.4rem; }
    </style>
</head>
<body>
    <h1>Servidor PHP corriendo dentro de Docker 🐳</h1>
    <div class="box">
        <p><strong>PHP:</strong> <?= phpversion() ?></p>
        <p><strong>Estado de la base de datos:</strong> <?= htmlspecialchars($mensaje) ?></p>
    </div>
</body>
</html>
