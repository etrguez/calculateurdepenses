
<?php

$databaseUrl = getenv('DATABASE_URL');


if (!$databaseUrl) {
    die("La variable d'environnement DATABASE_URL n'est pas définie.");
}

$parsedUrl = parse_url($databaseUrl);

$servername = $parsedUrl['host']; 
$username = $parsedUrl['user'];  
$password = $parsedUrl['pass'];  
$dbname = ltrim($parsedUrl['path'], '/'); 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
