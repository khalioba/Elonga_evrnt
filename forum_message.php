<?php
include('include/header.php');

$api_url_forums = $apiurl . 'forum/'.$_GET['id_forume'];
$result_forums = fetchDataFromApi($api_url_forums);
?>

<div class="forum_image space_bottom">
    <img src="<?php echo $result_forums['event']['event_image'] ?>" alt="">
</div>


<div class="discussion space_bottom space2">
    <h3>Discussion</h3>
    <?php foreach ($result_forums['forums'] as $forum) { ?>
    <div class="discussion_bg space_bottom">
        <div class="discussion_all">
            <div class="discussion_profile">
                <img src="<?php echo $forum['user']['profil'] ?>" alt="">
            </div>
            <div class="discussion_text space_bottom">
                <div class="discussion_profile_name">
                    <h5><?php echo $forum['user']['user_name'] ?></h5>
                </div>
                <div class="disucssion_message">
                    <p><?php echo $forum['message'] ?></p>
                </div>
            </div>
            <div class="discussion_date_time">
                <p><?php echo $forum['date'] ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<form class="forum_message_typing" action="forum_message.php">
    <input type="text" placeholder="Message..." name="search2">
    <button type="submit"><img src="image/sent_message.svg" alt=""></button>
</form>

<br><br>