<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
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
<body class="bg-light">
    <header class="bg-primary text-white text-center py-3 mb-4">
        <h1>Calculateur de Dépenses</h1>
        <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <a href="deconnexion.php" class="btn btn-danger">Déconnexion</a>
    </header>

    <main class="container">
        <section id="add-expense" class="mb-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="h5">Ajouter une dépense</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="ajout_depense.php">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Montant (€) :</label>
                            <input type="number" name="amount" id="amount" step="0.01" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie :</label>
                            <select name="category" id="category" class="form-select">
                                <option value="Nourriture">Nourriture</option>
                                <option value="Transport">Transport</option>
                                <option value="Loisirs">Loisirs</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date :</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description :</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Facultatif"></textarea>
                        </div>

                        <button type="submit" class="btn btn-info">Ajouter</button>
                    </form>
                </div>
            </div>
        </section>

        <section id="expense-list" class="mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5">Liste des dépenses</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-info">
                            <tr>
                                <th>Montant (€)</th>
                                <th>Catégorie</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'liste_depenses.php'; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="total-expense">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="h5">Total des dépenses</h2>
                </div>
                <div class="card-body">
                    <?php include 'total_depenses.php'; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center py-3 bg-dark text-white mt-4">
        <p>&copy; 2024 - Calculateur de Dépenses</p>
    </footer>
    <script src="../script/script.js"></script>
</body>
</html>
