<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
</head>

<body>

    <h2>Connexion</h2>

    <form action="main.php" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>

</body>

</html>