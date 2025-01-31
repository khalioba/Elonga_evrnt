<?php
$id_event= $_GET['id_event'];
$api_url_forums = $apiurl . 'forums/' . $id_event;
$result_forums = fetchDataFromApis($api_url_forums);

$limit = 3;
$forums_limited = array_slice($result_forums['forums'], 0, $limit);
?>
<div class="discussion space_bottom space2">
    <a href="forum_message.php?id_event=<?php echo $id_event; ?>"><h3 class="flexs flexs_space">Discussion <i class="fa-solid fa-arrow-right"></i></h3> </a>
   
   <?php  
   foreach ($forums_limited as $forums) {
    ?>
   <div class="discussion_bg space_bottom">
       <div class="discussion_all">
           <div class="discussion_profile">
               <img src="<?php echo $forums['user']['profil'] ?>" alt="">
           </div>
           <div class="discussion_text space_bottom">
               <div class="discussion_profile_name">
                   <h5><?php echo $forums['user']['user_name'] ?> <?php echo $forums['user']['first_name'] ?></h5>
               </div>
               <div class="disucssion_message">
                   <p><?php echo $forums['message'] ?></p>
               </div>
           </div>
           <div class="discussion_date_time">
               <p><?php echo timeAgo($forums['date']) ?></p>
           </div>
       </div>
   </div>
   <?php  } ?>
</div>
<div class="lireplus_button space2 space_bottom">
   <button>
       <a href="forum_message.php?id_event=<?php echo $id_event; ?>">Lire Plus</a>
   </button>
</div>

<div class="bottom">
    <button id="msg" class="btn_message"><i class="fa-solid fa-pen"></i></button>
   
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/post_forum.js?<?= rand() ?>"></script>
<br><br>