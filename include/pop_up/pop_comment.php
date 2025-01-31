<div id="pop_comment">
    
    <center>
        <h4 class="colw">
        Message
        </h4>
    </center>
<div class="input_msg">
<input type="hidden" name="id_event" id="id_event" value="<?php echo $_GET['id_event'] ?>" />
<input type="hidden" name="user" id="user" value="<?= $result[0]['id_user'] ?>" />
    <textarea class="full" id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>
    <button onclick="messagess()" class="btn_msg"><i class="fa-solid fa-paper-plane"></i> Envoyer</button>
    
    </div>
    
</div>