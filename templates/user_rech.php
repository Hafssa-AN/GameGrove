<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="./css/ajouter.css">
</head>
<body>



    <section class="p-3">
        <h1 class="ajouter-title">Ajouter Des Amis</h1>
    
        <?php 
        foreach ($_SESSION['users'] as $user) : ?>
        <div class="">
            <div class="friend-element flex mb-2">
                <img class="h-100" src="recources/<?php echo $user['u_image']; ?>" alt="">
                <div class="ml-3 flex flex-column justify-content-between w-100 p-1">
                    <strong class=""><?php $user['nom'].' '. $user['prenom']?></strong>
                    <div class="btns flex justify-content-between w-100">
                        <button class="cursor-pointer">Voir le profile</button>
                        <button class="cursor-pointer">Modifier</button>
                        <button class="cursor-pointer">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </section>





</body>
</html>