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
    <?php
    $forums = array_reverse($result_forums['forums']);
     foreach ($forums as $forum) { 

        if ($result[0]['id_user']  === $forum['user']['id_user']) {
            $ss = 2;
        } else {
            $ss = '';
        }
        ?>
    <div class="discussion_bg space_bottom">
        <div class="discussion_all<?php echo $ss ?>">
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
    <button id="msg" class="btn_message"><i class="fa-solid fa-pen"></i></button>
   
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/post_forum.js?<?= rand() ?>"></script>
<br><br>