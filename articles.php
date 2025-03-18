/* articles.php : Liste de tous les articles */
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des Articles</title>
</head>
<body>
    <h1>Liste de tous les Articles</h1>
    <form method="GET">
        <label for="categorie">Catégorie:</label>
        <input type="text" id="categorie" name="categorie">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date">
        <button type="submit">Filtrer</button>
    </form>
    <div class="articles">
        <?php
        $query = "SELECT a.id, a.titre, au.nom AS auteur, a.date FROM article a JOIN auteur au ON a.auteur = au.id";
        $conditions = [];
        if (!empty($_GET['categorie'])) {
            $conditions[] = "a.categorie = :categorie";
        }
        if (!empty($_GET['date'])) {
            $conditions[] = "a.date = :date";
        }
        if ($conditions) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
        $query .= " ORDER BY a.date DESC";
        $stmt = $pdo->prepare($query);
        if (!empty($_GET['categorie'])) $stmt->bindParam(':categorie', $_GET['categorie']);
        if (!empty($_GET['date'])) $stmt->bindParam(':date', $_GET['date']);
        $stmt->execute();
        while ($article = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='article'>";
            echo "<h2><a href='article.php?id={$article['id']}'>{$article['titre']}</a></h2>";
            echo "<p>Par : {$article['auteur']} - {$article['date']}</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>