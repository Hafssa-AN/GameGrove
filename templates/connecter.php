<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="css/sinscrire.css">
</head>
<body>

    <?php if ($_SESSION['feedback']): ?>
    <?php endif; ?>
    <h1 class="text-center sinscrire-h1">Se connecter</h1>
    <form action="controleur.php" class="sinscrire-form" method="POST">
        <div class="flex justify-content-between align-items-center">
            <label>Gmail: </label>
            <input type="email" name="email" />
        </div>

        <div class="flex justify-content-between align-items-center">
            <label>Mot de pass: </label>
            <input type="password" name="password" required/>
        </div>
        <input type="submit"name="action" value="connecter" class="cursor-pointer">
    </form>





</body>
</html>