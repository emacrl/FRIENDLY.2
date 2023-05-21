<?php

// Connecter à la base de données
// PDO = package pr interaction base de données

try { 
    $database = new PDO (
        "mysql:host=localhost;dbname=twitter",
        "root",
        ""
    );

// récupérer exception PDO (de l'objet = error). Si on arrive pas à accéder au site, on crache le site.
} catch(PDOxception $error) {
    die($error);
}
