<?php

// Récupération du nom d'utilisateur et du mot de passe à partir du formulaire
function getInput()
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    return [$username, $password];
}

// Test si les identifiants sont correct si non il affiche une erreur
function startConnexionSQL($servername, $username_db, $password_db, $dbname)
{
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    if ($conn->connect_error) {
        return null;
    }
    return $conn;
}

// Essaie de se connecter à la bdd avec ls identifiant récuprer juste avant 
function login($username, $password, $conn)
{

    $sql = "SELECT * FROM users WHERE login = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Si le nom d'utilisateur est valide, vérifier le mot de passe haché
        $row = $result->fetch_assoc();
        return [$row["login"], $row["password"]];
    }

    return ["", ""];
}

function printMessage($username, $password, $password_hash_db)
{
    if (password_verify($password, $password_hash_db)) {
        // Si les informations sont valides, créer une session pour l'utilisateur
        $_SESSION['message'] = "Bonjour monsieur " . $username;
    } else {
        $_SESSION['message'] = "Oups une erreur est survenue...";
    }
}
