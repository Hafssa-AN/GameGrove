<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="index.css"> -->
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>

    <h1 class="p-3">Mon Profile</h1>
    <hr style="width: 70%;">
    <section style="padding: 1rem" class="profile-section">
        <!-- elements -->
            <div class="elements">
                <?php foreach ($_SESSION['u_jeux'] as $jeu) :?>
                    <div style="margin-bottom: 1rem;" class="element flex justify-content-between align-items-center">
                        <div style="gap: 1rem; height: 100%;" class="flex align-items-center">
                        <img class="element-img"  src="recources/<?php echo htmlspecialchars($jeu['j_image']); ?>" alt="">
                        <div><?php echo htmlspecialchars($jeu['nom']); ?></div>
                        </div>
                        <div style="gap: 2rem" class="flex">
                            <div class="buttons">JOUER</div>
                            <div class="buttons"><a href="controleur.php/?action=supprimer&id_jeu=<?php echo $jeu['j_id'];?>">SUPPRIMER</a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <!-- dik tswira lli 3la limn -->
        <div class="right-side p-1">
            <img class="mb-2" src="recources/profile-avatar.png" alt="profile-avatar">
            <strong class="mb-1"><?php echo $_SESSION['new_user'][0]['prenom'] . " ".$_SESSION['new_user'][0]['nom']?></strong>
            <div class="mb-1">AUTRE INFOS</div>
            <button>Modifier mes donnees</button>
        </div>
    </section>

</body>
</html>

