<?php

$host = getenv("DB_HOST") ?: "db";
$db = getenv("DB_NAME") ?: "lampdb";
$user = getenv("DB_USER") ?: "lampuser";
$password = getenv("DB_PASSWORD") ?: "";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Database forbindelse fejlede: " . $conn->connect_error);
}

echo "<h1>Opgave 3 - LAMP i Azure</h1>";
echo "<p>Apache og PHP virker!</p>";
echo "<p>MariaDB forbindelse virker!</p>";

$conn->close();

?>