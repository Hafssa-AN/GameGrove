<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>

<hr>

    <footer>
        <h3>contacter nous</h3>

        <div>
            <div class="social">
                <img src="recources/email-icon.png" alt="">
                <div>GameGove@gmail.com</div>
            </div>
            <div class="social">
                <img src="recources/discord-icon.png" alt="">
                <div>Game_Gove</div>
            </div>
            <div class="social">
                <img src="recources/instagram-icon.png" alt="">
                <div>Game_Gove</div>
            </div>
        </div>

        <p class="copyright">Copyright © 2010-2024 GameGove</p>
    </footer>