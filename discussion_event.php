<?php
$id_event= $_GET['id_event'];
$api_url_forums = $apiurl . 'forums/' . $id_event;
$result_forums = fetchDataFromApis($api_url_forums);
?>
<div class="discussion space_bottom space2">
   <h3>Discussion</h3>
   <?php  foreach ($result_forums['forums'] as $forums) { ?>
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
       <a href="discussion.php">Lire Plus</a>
   </button>
</div>