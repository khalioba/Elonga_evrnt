<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('include/inscription_header.php')
?>
<br>
<script>
    closeloader()
</script>
<center>
    <div class="welcome_text space">

        <p class="welcom_text1">Vous êtes le Bienvenue👋 <br /> sur Elonga event</p>
        <br>
        <!-- <p class="welcom_text2 space">Le site pour acheter les tickets et se faire plaisir</p> -->
        <br>
        <p class="inscription_text space">Pour commencer votre aventure, inscrivez-vous en entrant votre numéro de
            téléphone</p>
        <br>
    </div>

    <div class="informations space">

        <div class="inscription_box">
            <div class="form" id="contactForm">
            
            <div class="input-wrapper">
    <span class="prefix">+242</span>
    <input class="styleinput" type="tel" name="number" id="number" placeholder="Numéro de téléphone" maxlength="9" minlength="9" required>
</div><br>

                <button onclick="getUsersByNumber()" class="valid" >Recevoir le code</button>
            </div>
        </div>
    </div>

</center>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/users.js?<?= rand() ?>"></script>