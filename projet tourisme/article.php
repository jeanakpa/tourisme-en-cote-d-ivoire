<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voyage";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $titre = $_POST["titreArticle"];
    $image = $_POST["imageArticle"];
    $date = $_POST["dateArticle"];
    $heure = $_POST["heureArticle"];
    $ville = $_POST["villeArticle"];
    $prix = $_POST["prixArticle"];
    // Préparer et exécuter la requête SQL pour insérer les données
    $sql = "INSERT INTO historique (id_historique, titre_historique, image_historique, date_historique, heure_historique, ville_historique, prix_historique, statut_historique) VALUES (NULL, '$titre', '$image', '$date', '$heure', '$ville', '$prix', 'en cours')";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succès";
    } else {
        echo "Erreur lors de l'enregistrement : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>