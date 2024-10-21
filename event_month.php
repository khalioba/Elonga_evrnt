<?php
include('include/header.php');
$_GET['month'];
month($_GET['month']); 
?>


<?php 
$api_url_events = $apiurl . 'eventsCurrent/'. month($_GET['month']);
$result_event = fetchDataFromApis($api_url_events);
?>


<div class="static_slide slide_thismonth space_bottom">
    <div class="static_slide_filter">
        <div class="static_slide_text">
            <h1><?php echo monthInFr($_GET['month']); ?></h1>
        </div>
    </div>
</div>

<center>
    <div class="description_text space_bottom">
        <p><?php echo monthInFr($_GET['month']); ?>, nous avons une programmation exceptionnelle avec une
            variété d'activités pour tous les goûts et tous les âges.
        </p>
    </div>
</center>

<div class="thismonth_items space2">
    <?php foreach ($result_event as $event) { ?>
        <?php include('include/bloc/event_month.php') ?>
    <?php } ?>
</div>