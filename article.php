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
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NP2J62WV');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Articles</title>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP2J62WV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
