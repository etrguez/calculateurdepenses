<?php

$databaseUrl = "mysql://l9kyt5ogqri97pep:ar34291hup64ow84@sabaik6fx8he7pua.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/pggjuyeivb031m9o";


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
