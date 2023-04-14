<?php
require "login_function.php";

// Récupération du nom d'utilisateur et du mot de passe à partir du formulaire

session_start();

[$username, $password] = getInput();

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "projetreseaux";


// Connexion à la base de données
$conn = startConnexionSQL($servername, $username_db, $password_db, $dbname);

[$login, $passord_hash] = login($username, $password, $conn);

printMessage($login, $password, $passord_hash);

echo $_SESSION['message'];

$conn->close();
