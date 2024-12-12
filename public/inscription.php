<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center text-primary fw-bold mb-4">Créer un compte</h2>
                        
                        <!-- Formulaire d'inscription -->
                        <form method="POST" action="inscription.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse email :</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe :</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Créez un mot de passe" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                        </form>

                      
                        <div class="text-center mt-3">
                            <p class="text-secondary">Déjà inscrit ? <a href="connexion.php" class="text-primary fw-bold">Se connecter</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include '../config/db_connection.php';

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

       
        $query = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-3 text-center'>Inscription réussie ! Redirection en cours...</div>";
            header("refresh:2;url=connexion.php"); 
        } else {
            echo "<div class='alert alert-danger mt-3 text-center'>Erreur : " . $stmt->error . "</div>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
