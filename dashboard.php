<?php
require 'vendor/autoload.php';

use Google\Client;
use Google\Service\AnalyticsData;

// Remplace par ton ID de propriété GA4
$propertyId = '482496873';

// Crée un client Google API
$client = new Client();
$client->setAuthConfig('credentials.json'); // Assure-toi d'avoir ton fichier credentials.json
$client->addScope(AnalyticsData::ANALYTICS_READONLY);

// Crée un service Google Analytics Data
$analytics = new AnalyticsData($client);

// Préparer la requête pour obtenir les données
$request = new Google\Service\AnalyticsData\RunReportRequest();
$request->setDimensions([new Google\Service\AnalyticsData\Dimension(['name' => 'city'])]);
$request->setMetrics([new Google\Service\AnalyticsData\Metric(['name' => 'activeUsers'])]);

// Exécuter la requête pour récupérer les données
$response = $analytics->properties->runReport("properties/{$propertyId}", $request);

// Structure HTML de la page
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport Google Analytics 4</title>
    <link rel="stylesheet" href="style.css"> <!-- Assure-toi d'avoir un fichier CSS -->
</head>
<body>
    <div class="container">
        <h1>Rapport Google Analytics 4 - Utilisateurs actifs par Ville</h1>

        <?php if (count($response->getRows()) > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Ville</th>
                        <th>Utilisateurs actifs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Parcours des lignes des données retournées par l'API
                    foreach ($response->getRows() as $row) {
                        $city = $row->getDimensionValues()[0]->getValue();
                        $activeUsers = $row->getMetricValues()[0]->getValue();
                        echo "<tr><td>{$city}</td><td>{$activeUsers}</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune donnée disponible pour les utilisateurs actifs par ville.</p>
        <?php endif; ?>

    </div>
</body>
</html>
