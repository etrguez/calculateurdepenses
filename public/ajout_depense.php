<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}


include '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO expenses (amount, category, date, description, user_id) 
              VALUES ('$amount', '$category', '$date', '$description', '$user_id')";

    if ($conn->query($query) === TRUE) {
        header("Location: dashboard.php"); 
    } else {
        echo "<div class='alert alert-danger mt-3'>Erreur : " . $conn->error . "</div>";
    }

    $conn->close();
}
?>
