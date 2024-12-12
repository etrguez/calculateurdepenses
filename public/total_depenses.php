<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

include '../config/db_connection.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT SUM(amount) AS total FROM expenses WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    echo "<p class='fs-5'>Total : <strong>" . htmlspecialchars($row['total'] ?? 0) . " €</strong></p>";
} else {
    echo "<p class='fs-5'>Total : <strong>0 €</strong></p>";
}

$conn->close();
?>
