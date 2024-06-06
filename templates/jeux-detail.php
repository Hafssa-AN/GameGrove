<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeux-detail</title>
    <link rel="stylesheet" href="css/jeux-detail.css">

</head>
<body>

    <h1 class="p-3"><?php $jeu = $_SESSION['jeu'][0]; echo $jeu['nom'];?></h1>
    <section>
        <div class="game-detail-grid">
            <figure>
                <img class="w-100" src="recources/<?php echo $jeu['j_image'];?>" alt="">
                <figcaption class="p-1">
                    <strong><?php echo $jeu['nom']?></strong>
                    <p><?php echo $jeu['description']?></p>
                    <div class="mt-1 btns flex justify-content-between w-75 mx-auto">
                        <?php if(isset($_SESSION["email"])): ?>
                            <button class="cursor-pointer"><a href="controleur.php/?action=jouer">JOUER</a></button>
                            <button class="cursor-pointer"><a href="controleur.php/?action=ajouter&id_jeu=<?php echo $jeu['j_id']; ?>">AJOUTER</a></button>
                        <?php endif; ?>
                    </div>
                </figcaption>
            </figure>
            <div class="score-container">
                <strong>Score</strong>
                <div class="element flex mb-2">
                    <img class="h-100" src="../recources/friend-1.png" alt="">
                    <div class="p-1 flex justify-content-between align-items-center w-100">
                        <div class="flex flex-column justify-content-between">
                            <strong class="mb-1">Marie Dupont</strong>
                            <button>Voir le profile</button>
                        </div>
                        <div class="score-number">
                            #1
                        </div>
                    </div>
                </div>


                <div class="element flex mb-2">
                    <img class="h-100" src="../recources/friend-1.png" alt="">
                    <div class="p-1 flex justify-content-between align-items-center w-100">
                        <div class="flex flex-column justify-content-between">
                            <strong class="mb-1">Marie Dupont</strong>
                            <button>Voir le profile</button>
                        </div>
                        <div class="score-number">
                            #1
                        </div>
                    </div>
                </div>

                <div class="element flex mb-2">
                    <img class="h-100" src="../recources/friend-1.png" alt="">
                    <div class="p-1 flex justify-content-between align-items-center w-100">
                        <div class="flex flex-column justify-content-between">
                            <strong class="mb-1">Marie Dupont</strong>
                            <button>Voir le profile</button>
                        </div>
                        <div class="score-number">
                            #1
                        </div>
                    </div>
                </div>

                <div class="element flex mb-2">
                    <img class="h-100" src="../recources/friend-1.png" alt="">
                    <div class="p-1 flex justify-content-between align-items-center w-100">
                        <div class="flex flex-column justify-content-between">
                            <strong class="mb-1">Marie Dupont</strong>
                            <button>Voir le profile</button>
                        </div>
                        <div class="score-number">
                            #1
                        </div>
                    </div>
                </div>

                <div class="element flex mb-2">
                    <img class="h-100" src="../recources/friend-1.png" alt="">
                    <div class="p-1 flex justify-content-between align-items-center w-100">
                        <div class="flex flex-column justify-content-between">
                            <strong class="mb-1">Marie Dupont</strong>
                            <button>Voir le profile</button>
                        </div>
                        <div class="score-number">
                            #1
                        </div>
                    </div>
                </div>

                <div class="element flex mb-2">
                    <img class="h-100" src="../recources/friend-1.png" alt="">
                    <div class="p-1 flex justify-content-between align-items-center w-100">
                        <div class="flex flex-column justify-content-between">
                            <strong class="mb-1">Marie Dupont</strong>
                            <button>Voir le profile</button>
                        </div>
                        <div class="score-number">
                            #1
                        </div>
                    </div>
                </div>

                <div class="element flex mb-2">
                    <img class="h-100" src="../recources/friend-1.png" alt="">
                    <div class="p-1 flex justify-content-between align-items-center w-100">
                        <div class="flex flex-column justify-content-between">
                            <strong class="mb-1">Marie Dupont</strong>
                            <button>Voir le profile</button>
                        </div>
                        <div class="score-number">
                            #1
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
</body>
</html>