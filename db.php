
<?php
$host = 'sql105.infinityfree.com';
$dbname = 'if0_38553083_article';  // Remplace par le nom de ta base de données
$user = 'if0_38553083';        // Remplace par ton nom d'utilisateur MySQL
$password = '4MNzxozB0X';       // Remplace par ton mot de passe MySQL
$port = '3306';                // Port par défaut pour MySQL

try {
    // Crée une nouvelle instance PDO pour MySQL
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données MySQL.";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
