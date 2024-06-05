<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="css/sinscrire.css">
</head>
<body>

    <h1 class="text-center sinscrire-h1">S'inscrire</h1>
    <form action="controleur.php" class="sinscrire-form" method="POST">
        <div class="flex justify-content-between align-items-center">
            <label>Nom:</label>
            <input type="text" name="nom" required />
        </div>
        <div class="flex justify-content-between align-items-center">
            <label>Prénom:</label>
            <input type="text" name="prenom" required />
        </div>
        <div class="flex justify-content-between align-items-center">
            <label>Pays:</label>
            <input type="text" name="pays" required />
        </div>
        <div class="flex justify-content-between align-items-center">
            <label>Email:</label>
            <input type="email" name="email" required />
        </div>
        <div class="flex justify-content-between align-items-center">
            <label>Mot de passe:</label>
            <input type="password" name="password" required />
        </div>
        <div class="flex justify-content-between align-items-center">
            <label>Confirmer le mot de passe:</label>
            <input type="password" name="confirm-password" required />
        </div>
        <input type="submit" name="action" value="inscrire" class="cursor-pointer">
    </form>
</body>
</html>
