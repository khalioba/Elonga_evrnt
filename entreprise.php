<?php
include('include/header.php');

$api_url_companys = $apiurl . 'companys/';
$result_companys = fetchDataFromApi($api_url_companys);
?>
 

<div class="static_slide slide_thismonth space_bottom">
    <div class="static_slide_filter">
        <div class="static_slide_text">
            <h1>Entreprises</h1>
        </div>
    </div>  
</div>

<div class="entreprise space_bottom space2">
<?php foreach ($result_companys as $company) { ?>
    <a href="entreprise_details.php?id_company=<?php echo $company['id_company'] ?>">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="<?php echo $company['logo'] ?>" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5><?php echo $company['name'] ?></h5>
                    </div>
                    <div class="entreprise_about">
                        <p><?php echo $company['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <?php } ?>
    <!-- <a href="entreprise_details.php">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="image/entreprise.png" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5>Arashi</h5>
                    </div>
                    <div class="entreprise_about">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                            Lorem ipsum dolor sit amet,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="entreprise_details.php">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="image/entreprise.png" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5>Arashi</h5>
                    </div>
                    <div class="entreprise_about">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                            Lorem ipsum dolor sit amet,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="entreprise_details.php">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="image/entreprise.png" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5>Arashi</h5>
                    </div>
                    <div class="entreprise_about">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                            Lorem ipsum dolor sit amet,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="entreprise_details.php">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="image/entreprise.png" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5>Arashi</h5>
                    </div>
                    <div class="entreprise_about">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                            Lorem ipsum dolor sit amet,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="entreprise_details.php">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="image/entreprise.png" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5>Arashi</h5>
                    </div>
                    <div class="entreprise_about">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                            Lorem ipsum dolor sit amet,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="entreprise_details.php">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="image/entreprise.png" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5>Arashi</h5>
                    </div>
                    <div class="entreprise_about">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                            Lorem ipsum dolor sit amet,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a href="entreprise_details.php">
        <div class="entreprise_bg space_bottom">
            <div class="entreprise_items">
                <div class="entreprise_profile">
                    <img src="image/entreprise.png" alt="">
                </div>
                <div class="entreprise_text space_bottom">
                    <div class="entreprise_profile_name">
                        <h5>Arashi</h5>
                    </div>
                    <div class="entreprise_about">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                            Lorem ipsum dolor sit amet,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a> -->


</div>