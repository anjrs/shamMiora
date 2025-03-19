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
    <title><?= htmlspecialchars($auteur['nom']) ?></title>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP2J62WV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <h1><?= htmlspecialchars($auteur['nom']) ?></h1>
    <p><?= nl2br(htmlspecialchars($auteur['a_propos'])) ?></p>
    <h2>Articles de cet auteur</h2>
    <div class="articles">
        <?php
        $stmt = $pdo->prepare("SELECT id, titre FROM article WHERE auteur_id = ? ORDER BY date DESC");
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