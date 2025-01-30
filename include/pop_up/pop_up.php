<div id="myModal" class="modal">

  <!-- Modal content --> 
  <div class="modal-content">
    <span class="close"></span>
    <?php
    include('include/pop_up/pop_charge.php');
    
    if (isset($_GET['id_event'])) {
        include('include/pop_up/pop_tickets.php');
    }
    
    include('include/pop_up/pop_image.php');
    include('include/pop_up/pop_comment.php');
    ?>
  </div>

</div>
