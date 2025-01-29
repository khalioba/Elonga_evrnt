<?php
$id_event= $_GET['id_event'];
$api_url_ticket = $apiurl . 'tickets/' . $id_event;
$result_tickets = fetchDataFromApis($api_url_ticket);
?>
<div id="pop_tikets">
<center>
        <h4 class="colw">
        Acheter un ticket
        </h4>
    </center>
<!-- <br><br><br><br>
    <center>
        <h4 class="colw">
        Pas de  ticket pour le moment
        </h4>
    </center> -->
    <?php  foreach ($result_tickets as $tickets) { ?>
        <div class="ticket_items space_top2">
        <div class="ticket_items_left">
            <img src="<?php echo $tickets['events']['image'] ?>" alt="">
        </div>
        <div class="ticket_items_right">
            <div class="ticket_name_about">
                <p span class="ticket_name"><?php echo $tickets['name'] ?></p>
                <p><?php echo $tickets['description'] ?>.</p>
            </div>
            <div class="ticket_date space_top2">
                <img src="image/calendar.svg" alt=""><?php echo $tickets['events']['date'] ?>
            </div>
            <div class="event_type_premium space_top2 space_bottom">
                <p><?php echo $tickets['price'] ?> FAFC</p>
            </div>
        </div>
    </div>
        <?php  } ?>
</div>