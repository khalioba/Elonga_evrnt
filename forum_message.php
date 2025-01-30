<?php
include('include/header.php');

$api_url_forums = $apiurl . 'forums/'.$_GET['id_event'];
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
                <p><?php echo timeAgo($forum['date']) ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<div class="bottom">
    <button id="msg" class="btn_message"><i class="fa-solid fa-paper-plane"></i></button>
   
</div>

<br><br>