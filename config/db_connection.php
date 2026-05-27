<?php

require_once __DIR__ . '/env.php';

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_port = (int)(getenv('DB_PORT') ?: '3306');
$db_name = getenv('DB_NAME') ?: 'expenses_db';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: '';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die('Échec de la connexion : ' . $conn->connect_error);
}
