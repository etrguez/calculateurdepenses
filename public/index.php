<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculateur de Dépenses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary text-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card text-center shadow-lg border-0">
                    <div class="card-body p-5">
                        <h1 class="card-title mb-4 fw-bold text-primary">Bienvenue !</h1>
                        <p class="card-text fs-5 text-secondary">
                            Gérez vos dépenses de manière simple et efficace.
                        </p>
                        <div class="mt-4">
                            <a href="connexion.php" class="btn btn-primary btn-lg me-3 w-100 mb-3">Se connecter</a>
                            <a href="inscription.php" class="btn btn-outline-primary btn-lg w-100">S'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
