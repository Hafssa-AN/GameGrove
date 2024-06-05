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
         foreach ($_SESSION['jeux'] as $jeu) : ?>
            <figure class="jeux-container">
                <img class="w-100" src="../recources/jeux-1.jpg" alt="">
                <figcaption>
                    <h3><?php echo $jeu['nom']; ?></h3>
                    <p><?php echo $jeu['description']; ?></p>
                    <div class="btns flex justify-content-center gap-1 mt-1">
                        <button class="cursor-pointer">JOUER</button>
                        <button class="cursor-pointer">AJOUTER</button>
                    </div>
                </figcaption>
            </figure>
        <?php endforeach; ?>

            <figure class="jeux-container">
                <img class="w-100" src="../recources/jeux-2.png" alt="">
                <figcaption>
                    <h3>Fortnite</h3>
                    <p>offre une expérience multijoueur dynamique</p>
                    <div class="btns flex justify-content-center gap-1 mt-1">
                        <button class="cursor-pointer">JOUER</button>
                        <button class="cursor-pointer">AJOUTER</button>
                    </div>
                </figcaption>
            </figure>

            <figure class="jeux-container">
                <img class="w-100" src="../recources/jeux-3.png" alt="">
                <figcaption>
                    <h3>Fortnite</h3>
                    <p>offre une expérience multijoueur dynamique</p>
                    <div class="btns flex justify-content-center gap-1 mt-1">
                        <button class="cursor-pointer">JOUER</button>
                        <button class="cursor-pointer">AJOUTER</button>
                    </div>
                </figcaption>
            </figure>

            

            
        </div>
    </section>
</body>
</html>