<?php
include('include/header.php');
$id_event= $_GET['id_event'];

$api_url_event = $apiurl . 'events/' . $id_event;
$result = fetchDataFromApi($api_url_event);

if ($result['statu'] === 1) {
    $style = 'event_type_premium';
    $name = 'Evènement payant';
    $ticket = 'Acheter un ticket';
}
else{
    $style = 'event_type';
    $name = 'Evènement gratuit';
    $ticket = 'Prendre un ticket';
}
?>

<div class="visuel_slide space_bottom">
    <img src="<?php echo $result['image'] ?>" alt="">
</div>

<center>
    <div class="visuel_title space2 space_bottom">
        <h1><?php echo $result['title'] ?></h1>
    </div>
</center>

<div class="event_date space2 space_bottom">
    <div class="event_date_place_type">
        <div class="event_date_place">
            <div class="event_date_time">
                <img src="image/calendar.svg" alt="">
                <p><?php echo $result['date'] ?> </p>
            </div>
            <div class="event_place">
                <img src="image/placeholder.svg" alt="">
                <p><?php echo $result['address'] ?></p>
            </div>
        </div>
        <div class="<?php echo $style ?>">
            <p><?php echo $name ?></p>
        </div>

    </div>
</div>

<div class="event_about space2 space_bottom">

    <center>
        <h3>A Propos</h3>
    </center>
    <p><?php echo $result['description'] ?></p>
</div>

<center>
    <div class="buy_button space_bottom">
        <button><?php echo $ticket ?></button>
    </div>

</center>

<br>

<div class="discussion space_bottom space2">
    <h3>Discussion</h3>
    <div class="discussion_bg space_bottom">
        <div class="discussion_all">
            <div class="discussion_profile">
                <img src="image/Aigle_Ny.jpg" alt="">
            </div>
            <div class="discussion_text space_bottom">
                <div class="discussion_profile_name">
                    <h5>Adef Khalik Oba</h5>
                </div>
                <div class="disucssion_message">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                        risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                        Lorem ipsum dolor sit amet,
                    </p>
                </div>
            </div>
            <div class="discussion_date_time">
                <p>17/06/2024 05:30</p>
            </div>
        </div>
    </div>
    <div class="discussion_bg space_bottom">
        <div class="discussion_all">
            <div class="discussion_profile">
                <img src="image/Aigle_Ny.jpg" alt="">
            </div>
            <div class="discussion_text space_bottom">
                <div class="discussion_profile_name">
                    <h5>Adef Khalik Oba</h5>
                </div>
                <div class="disucssion_message">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                        risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                        Lorem ipsum dolor sit amet,
                    </p>
                </div>
            </div>
            <div class="discussion_date_time">
                <p>17/06/2024 05:30</p>
            </div>
        </div>
    </div>
    <div class="discussion_bg space_bottom">
        <div class="discussion_all">
            <div class="discussion_profile">
                <img src="image/Aigle_Ny.jpg" alt="">
            </div>
            <div class="discussion_text space_bottom">
                <div class="discussion_profile_name">
                    <h5>Adef Khalik Oba</h5>
                </div>
                <div class="disucssion_message">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                        risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing.
                        Lorem ipsum dolor sit amet,
                    </p>
                </div>
            </div>
            <div class="discussion_date_time">
                <p>17/06/2024 05:30</p>
            </div>
        </div>
    </div>
</div>
<div class="lireplus_button space2 space_bottom">
    <button>
        <a href="discussion.php">Lire Plus</a>
    </button>
</div>