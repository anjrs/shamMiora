<?php include 'db.php'; ?>
<?php
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM auteur WHERE id = ?");
$stmt->execute([$id]);
$auteur = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$auteur) {
    echo "Auteur introuvable.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= htmlspecialchars($auteur['nom']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($auteur['nom']) ?></h1>
    <p><?= nl2br(htmlspecialchars($auteur['a_propos'])) ?></p>
    <h2>Articles de cet auteur</h2>
    <div class="articles">
        <?php
        $stmt = $pdo->prepare("SELECT id, titre FROM article WHERE auteur = ? ORDER BY date DESC");
        $stmt->execute([$id]);
        while ($article = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='article'>";
            echo "<h3><a href='article.php?id={$article['id']}'>{$article['titre']}</a></h3>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>