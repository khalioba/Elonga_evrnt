<?php
include('include/inscription_header.php');
$number = $_GET['number'];
?>
<br>

<center>
    <div class="welcome_text space">
        <p class="inscription_text space">Entrez le code reçu par SMS</p>
        <br>
    </div>
 
    <div class="informations space">
        <div class="inscription_box">
            
            <form action="signup.php" method="GET">
            <div class="form" id="contactForm">
                    <div class="inscription_box">
                        <input class="styleinput" type="tel" name="otp" id="otp" placeholder="Entrer le code reçu par SMS" required>
                        <br>
                        <input type="hidden" name="number" value="<?= $number ?>">
                    </div>
                    <button class="valid" type="submit">Connexion</button>
                    </div>
                </form>
        </div>
    </div>

</center>