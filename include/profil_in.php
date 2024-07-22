<div id="Profil" class="tabcontent">
    <div class="couverture_profil_user">
        <div class="couverture_user">
            <img src="image/entreprise_couverture.png" alt="">
        </div>
        <div class="photo_user_btnmodifier">
            <div class="photo_user">
            <?php 
            if ($result[0]['profil']) {
                $img = $result[0]['profil'];
            }else {
                $img = 'image/profil.png';
            }
            ?>
                <img src="<?= $img ?>" alt="">
            </div>
            <div class="btn_modifier">
                <button>
                    <a href="upusers.php">
                    Modifier
                    </a>
                </button>
            </div>
        </div>
    </div>

    <div class="profil_user_information">
        <div class="profil_user_info_items space_bottom">
            <div class="information_title space">
                <p>Noms & Prénoms</p>
            </div>
            <div class="information_description space2">
                <p><?= $result[0]['name'].' '. $result[0]['first_name'] ?></p>
            </div>
        </div>

        <div class="profil_user_info_items space_bottom">
            <div class="information_title space">
                <p>Ville</p>
            </div>
            <div class="information_description space2">
                <p><?= $result[0]['ville'] ?></p>
            </div>
        </div>

        <div class="profil_user_info_items space_bottom">
            <div class="information_title space">
                <p>Numéro</p>
            </div>
            <div class="information_description space2">
                <p><?= $result[0]['tel'] ?></p>
            </div>
        </div>

        <div class="profil_user_info_items space_bottom">
            <div class="information_title space">
                <p>G-mail</p>
            </div>
            <div class="information_description space2">
                <p><?= $result[0]['email'] ?></p>
            </div>
        </div>
        
        <div class="profil_user_info_items space_bottom">
            <div class="information_title space">
                <p>Genre</p>
            </div>
            <div class="information_description space2">
                <p><?= $result[0]['genre'] ?></p>
            </div>
        </div>
        <div class="profil_user_info_items space_bottom">
            <div class="information_title space">
                <p>Age</p>
            </div>
            <div class="information_description space2">
                <p><?= $result[0]['age'] ?></p>
            </div>
        </div>
        


    </div>



</div>