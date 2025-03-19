<?php include 'db.php'; ?>
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
    <title>Liste des Auteurs</title>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP2J62WV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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