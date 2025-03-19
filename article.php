<?php include 'db.php'; ?>
<?php
if (!isset($_GET['id'])) {
    echo "Aucun article spécifié.";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT a.*, au.nom AS auteur FROM article a JOIN auteur au ON a.auteur_id = au.id WHERE a.id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$article = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$article) {
    echo "Article non trouvé.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J6L56V6LNM"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-J6L56V6LNM');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= htmlspecialchars($article['titre']) ?></title>
</head>
<body>
    <div class="container">
        <article class="article-detail">
            <h1 class="article-title"><?= htmlspecialchars($article['titre']) ?></h1>
            <h3 class="article-subtitle"><?= htmlspecialchars($article['sous_titre']) ?></h3>
            <p class="article-meta">
                <strong>Par :</strong> <?= htmlspecialchars($article['auteur']) ?>
                <span class="article-date"> | <?= htmlspecialchars($article['date']) ?></span>
            </p>
            <div class="article-image">
                <img src="<?= htmlspecialchars($article['photo']) ?>" alt="Image de l'article">
            </div>
            <div class="article-body">
                <p><?= nl2br(htmlspecialchars($article['corps'])) ?></p>
            </div>
            
            <div class="donation-button">
                <a href="donate.php" class="btn-donate">Faire un don</a>
            </div>
        </article>
    </div>
</body>
</html>
