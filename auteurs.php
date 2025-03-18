<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des Auteurs</title>
</head>
<body>
    <h1>Liste des Auteurs</h1>
    <div class="auteurs">
        <?php
        $stmt = $pdo->query("SELECT id, nom FROM auteur ORDER BY nom");
        while ($auteur = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='auteur'>";
            echo "<h2><a href='auteur.php?id={$auteur['id']}'>{$auteur['nom']}</a></h2>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>