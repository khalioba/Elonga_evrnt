<?php 
$api_url_events = $apiurl . 'eventsCurrent/';
$result_event = fetchDataFromApis($api_url_events);

// Récupérer le mois actuel (en format texte, ex: October)
$currentMonth = date('F');
?> 
<?php foreach ($result_event as $month_event) { ?>
<div class="programme_bloc">
    <a href="event_month.php?month=<?php echo $month_event['month'] ?>">
        <div class="nos_programme_title arrow space2">
            <p class="form_bf_title programme_title">
                <!-- Si le mois est égal au mois actuel, afficher "ce mois", sinon afficher le nom du mois -->
                <?php 
                if ($month_event['month'] === $currentMonth) {
                    echo "Ce mois";
                } else {
                    echo monthInFR($month_event['month']);
                }
                ?>
            </p>
            <img src="image/arrow_white.svg" alt="Arrow">
        </div>
    </a>
    <div class="all_programme">
        <?php foreach ($month_event['events'] as $event) { ?>
            <?php
            include('include/bloc/event.php')
            ?>
        <?php } ?>
    </div>
</div>
<?php } ?>
