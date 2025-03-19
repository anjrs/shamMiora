/* articles.php : Liste de tous les articles */
<?php include 'db.php'; ?>
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
    <title>Liste des Articles</title>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP2J62WV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Tous les articles</a></li>
                <li><a href="auteurs.php">Auteurs</a></li>
            </ul>
        </nav>
    </header>

    <h1>Liste de tous les Articles</h1>
    <form method="GET">
        <label for="categorie">Catégorie:</label>
        <input type="text" id="categorie" name="categorie">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date">
        <button type="submit">Filtrer</button>
    </form>
    <div class="articles-container">
        <?php
        $query = "SELECT a.id, a.titre, au.nom AS auteur, a.date FROM article a JOIN auteur au ON a.auteur_id = au.id";
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
            echo "<div class='article-card'>";
            echo "<h2 class='article-title'>{$article['titre']}</h2>";
            echo "<p class='article-meta'>Par : {$article['auteur']} - {$article['date']}</p>"; ?>
            <a href="article.php?id=<?= $article['id'] ?>" class="article-button">Lire</a>

           <?php echo "</div>"; 

         } ?>
        
    </div>
</body>
</html>