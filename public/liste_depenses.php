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


$query = "SELECT * FROM expenses WHERE user_id = '$user_id' ORDER BY date DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['amount']) . " €</td>";
        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td> <button class='btn btn-danger btn-sm btn-delete' data-id='" . htmlspecialchars($row['id']) . "'>Supprimer</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>Aucune dépense enregistrée.</td></tr>";
}

$conn->close();
?>
