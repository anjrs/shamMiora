<?php include 'db.php'; ?>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $mdp = $_POST['mot_de_passe'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE nom = :nom AND mot_de_passe = PASSWORD(:mdp)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->execute();
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        $_SESSION['utilisateur'] = $nom;
        header('Location: dashboard.php');
        exit();
    } else {
        $erreur = 'Nom ou mot de passe incorrect';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if (!empty($erreur)) echo "<p style='color: red;'>$erreur</p>"; ?>
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
