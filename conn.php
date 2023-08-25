<?php
    //Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "boutique";

    // $servername = "mysql-mikado.alwaysdata.net";
    // $username = "mikado";
    // $password = "MolimoSantu26'";
    // $dbname = "mikado_boutique";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

     // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }
?>


