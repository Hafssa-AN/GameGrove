<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link rel="stylesheet" href="./css/jeux.css">
</head>
<body>
    <hr>

    <section>
        <div class="flex justify-content-between align-items-center p-3">
            <h1 class="jeux-h1">Jeux</h1>
            <div class="flex">
                <input class="search-input" type="text" name="search" placeholder="Trouver un jeu">
                <button class="rechercher-btn cursor-pointer">Rechercher</button>
            </div>
        </div>

        <div class="jeux-grid p-2">
        <?php 
        if (isset($_SESSION['jeux']) && is_array($_SESSION['jeux'])) {
            foreach ($_SESSION['jeux'] as $jeu) : ?>
                <figure class="jeux-container">
                    <a href="controleur.php/?action=details_jeu&id_jeu=<?php echo $jeu['j_id']; ?>">
                        <img class="w-100" src="recources/<?php echo htmlspecialchars($jeu['j_image']); ?>" alt="">
                    </a>
                    <figcaption>
                        <h3>
                            <a href="controleur.php/?action=details_jeu&id_jeu=<?php echo $jeu['j_id']; ?>">
                                <?php echo htmlspecialchars($jeu['nom']); ?>
                            </a>
                        </h3>
                        <p><?php echo htmlspecialchars($jeu['description']); ?></p>
                        <div class="btns flex justify-content-center gap-1 mt-1">
                        <?php if(isset($_SESSION["email"])): ?>
                            <button class="cursor-pointer"><a href="controleur.php/?action=jouer">JOUER</a></button>
                            <button class="cursor-pointer"><a href="controleur.php/?action=ajouter&id_jeu=<?php echo $jeu['j_id']; ?>">AJOUTER</a></button>
                        <?php endif; ?>
                        </div>
                    </figcaption>
                </figure>
            <?php endforeach; 
        }
        ?>
        </div>
    </section>
</body>
</html>
