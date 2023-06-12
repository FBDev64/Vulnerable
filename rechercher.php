<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_d_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "nom_de_votre_base_de_donnees";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Récupération de la requête de recherche
$query = $_GET['query'];

// Échapper les caractères spéciaux pour prévenir les injections SQL
$query = mysqli_real_escape_string($conn, $query);

// Exécuter la requête de recherche
$sql = "SELECT * FROM votre_table WHERE colonne LIKE '%$query%'";
$result = mysqli_query($conn, $sql);

// Afficher les résultats
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Résultat: " . $row["colonne"] . "<br>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
