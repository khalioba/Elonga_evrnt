<?php
include('include/header.php');

$api_url_forums = $apiurl . 'forums/';
$result_forums = fetchDataFromApi($api_url_forums);
?>

<div class="static_slide slide_thismonth space_bottom">
    <div class="static_slide_filter">
        <div class="static_slide_text">
            <h1>Forum</h1>
        </div>
    </div>
</div>

<div class="forum_all space_top">
<?php foreach ($result_forums['tickets'] as $forum) { ?>
    <a href="forum_message.php">
        <div class="forum_items">
            <div class="forum_left">
                <img src="<?php echo $forum['event']['event_image'] ?>" alt="">
            </div>
            <div class="forum_right">
                <p span class="forum_title"><?php echo $forum['event']['event_title'] ?>"</p>
                <p><?php echo $forum['event']['event_description'] ?></p>
            </div>
            <div class="forum_total_msg">
                <p><?php echo count($forum['forums']); ?></p>
            </div>
        </div>
    </a>
<?php } ?>



</div>