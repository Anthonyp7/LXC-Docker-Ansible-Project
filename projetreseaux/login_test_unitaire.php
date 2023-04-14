<?php
// Inclusion du code à tester
require_once('login_function.php');

use PHPUnit\Framework\TestCase;

final class testLogin extends TestCase
{
    // Vérifie que les champ du formulaire ne sont pas vides 
    public function test_getInput(): void
    {
        [$username, $password] = getInput();
        $this->assertNotNull($username);
        $this->assertNotNull($password);
    }
    // Vérifie si la connexion à la bdd exist 
    public function test_startConnexionSQL(): void
    {
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "projetreseaux";

        $conn = startConnexionSQL($servername, $username_db, $password_db, $dbname);

        $this->assertNotNull($conn);
    }

    // Vériie que que l'identifiant et le mots de passe et bon depuis la bdd pour la connexion 
    public function test_login(): void
    {
        $username = "ProfDeMath";
        $password = "12345";

        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "projetreseaux";

        $conn = startConnexionSQL($servername, $username_db, $password_db, $dbname);

        [$login, $passord_hash] = login($username, $password, $conn);

        $this->assertEquals($login, $username);
        $this->assetTrue(password_verify($password, $passord_hash));
    }
}
