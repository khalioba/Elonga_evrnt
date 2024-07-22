<?php
include('include/header.php')
?>


<button class="tablink" onclick="openPage('Profil', this, '3px solid #00CCD0')" id="defaultOpen">Profil</button>
<button class="tablink" onclick="openPage('Ticket', this, '3px solid #00CCD0')" >Mes Tickets</button>


<?php
include('include/profil_in.php');
?>

<?php
include('include/ticket_in.php');
?>