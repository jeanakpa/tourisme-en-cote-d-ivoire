<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourisme";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $nationalite = $_POST["nationalite"];
    $langueNationale = $_POST["langue-nationale"];
    $langueSupplementaire = $_POST["langue-supplementaire"];
    $dateNaissance = $_POST["date-habitation"];
    $pwd = $_POST["pwd"];

    // Préparer et exécuter la requête SQL pour insérer les données
    $sql = "INSERT INTO `visiteur` (`id_visiteur`, `nom_visiteur`, `prenom_visiteur`, `email_visiteur`, `telephone_visiteur`, `nationalite_visiteur`, `langueNatio_visiteur`, `langue_supplementaire_visiteur`, `date_naissance_visiteur`, `pwd_visiteur`) VALUES (NULL, '$nom', '$prenom', '$email', '$telephone', '$nationalite', '$langueNationale', '$langueSupplementaire', '$dateNaissance', '$pwd')";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succès";
    } else {
        echo "Erreur lors de l'enregistrement : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
