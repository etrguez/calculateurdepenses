<?php
include '../config/db_connection.php';

if (isset($_GET['id'])) {
    $expenseId = $_GET['id'];

    $query = "DELETE FROM expenses WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $expenseId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>