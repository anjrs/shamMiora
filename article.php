<?php include 'db.php'; ?>
<?php
$stmt = $pdo->prepare("SELECT a.*, au.nom AS auteur FROM article a JOIN auteur au ON a.auteur_id = au.id ORDER BY a.date DESC LIMIT 10");
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$articles) {
    echo "Aucun article trouvé.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Articles</title>
</head>
<body>
    <?php foreach ($articles as $article): ?>
        <article>
            <h1>
                <a href="article.php?id=<?= $article['id'] ?>">
                    <?= htmlspecialchars($article['titre']) ?>
                </a>
            </h1>
            <h3><?= htmlspecialchars($article['sous_titre']) ?></h3>
            <p><strong>Par :</strong> <?= htmlspecialchars($article['auteur']) ?> - <em><?= htmlspecialchars($article['date']) ?></em></p>
            <img src="<?= htmlspecialchars($article['photo']) ?>" alt="Photo">
            <p><?= nl2br(htmlspecialchars($article['corps'])) ?></p>
            <hr>
        </article>
    <?php endforeach; ?>
</body>
</html>
