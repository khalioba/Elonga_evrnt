<?php
include('include/header.php');
$id_event= $_GET['id_event'];

$api_url_event = $apiurl . 'events/' . $id_event;
$result = fetchDataFromApi($api_url_event);

if ($result['statu'] === 1) {
    $style = 'event_type_premium';
    $name = 'Evènement payant';
    $ticket = 'Sélectionnez un ticket';
} 
else{
    $style = 'event_type';
    $name = 'Evènement gratuit';
    $ticket = 'Prendre un ticket';
}
?>

<div class="visuel_slide space_bottom">
    <img id="myimage" src="<?php echo $result['image'] ?>" alt="" (onclick)>
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
        <!-- <div class="<?php //echo $style ?>">
            <p><?php //echo $name ?></p>
        </div> -->

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
       <button id="myBtn"><?php echo $ticket ?></button>
   </div>
</center>

<br>


<?php
    include('discussion_event.php');
?>