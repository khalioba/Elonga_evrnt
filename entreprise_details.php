<?php
include('include/header.php');

$_GET['id_company'];

$api_url_companys = $apiurl . 'company/'.$_GET['id_company'];
$result_companys = fetchDataFromApi($api_url_companys);
?>

<center>
    <div class="entreprise_couverture_name space_bottom">
        <div class="entreprise_couverture entreprise_photo_couv">
            <img src="<?php echo $result_companys['image'] ?>" alt="">
        </div>
        <div class="entreprise_photo_profil">
            <img src="<?php echo $result_companys['logo'] ?>" alt="">
        </div>
        <div class="entreprise_name_type">
            <div class="entreprise_name">
                <p><?php echo $result_companys['name'] ?></p>
            </div>
            <div class="entreprise_type">
                <p><?php echo $result_companys['type'] ?></p>
            </div>
        </div>
    </div>
</center>

<div class="event_about space2 space_bottom space_top">
    <h3>A Propos</h3>
    <p><?php echo $result_companys['description'] ?></p>
</div>

<div class="entreprise_contact space2 space_bottom space_top">
    <div class="entreprise_action call">
        <a href="tel:<?php echo $result_companys['tel'] ?>">
            <img src="image/call.svg" alt="">
            <p>Appeler</p>
        </a>
    </div>
    <div class="entreprise_action placeholder">
        <a href="<?php echo $result_companys['maps'] ?>">
            <img src="image/placeholder.svg" alt="">
            <p>Itinéraire</p>
        </a>
    </div>
    <div class="entreprise_action ecrire">
        <a href="mailto:<?php echo $result_companys['email'] ?>">
            <img src="image/envelope.svg" alt="">
            <p>Ecrire</p>
        </a>
    </div>
    <div class="entreprise_action site_web">
        <a href="<?php echo $result_companys['web_site'] ?>">
            <img src="image/globe.svg" alt="">
            <p>Web</p>
        </a>
    </div>
</div>

<div class="entreprise_titre_images space2 space_top space_bottom">
    <h5>Images</h5>
</div>
<div class="entreprise_image_all space2 space_bottom">
    <div class="entreprise_image">
        <img src="image/event_portrait1.jpg" alt="">
        <img src="image/event_portrait2.jpg" alt="">
        <img src="image/event_portrait3.jpg" alt="">
        <img src="image/event_portrait4.jpg" alt="">
        <img src="image/event_portrait5.jpg" alt="">
        <img src="image/event_portrait6.jpg" alt="">
    </div>
</div>

</div>