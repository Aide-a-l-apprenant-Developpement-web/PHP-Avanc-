<?php 
$user_name = $_POST['user_name'];
$user_firstname = $_POST['user_firstname'];
$user_email = $_POST['user_email'];
$user_tel = $_POST['user_tel'];
$user_subject = $_POST['user_subject'];
$user_messsage = $_POST['user_messsage'];
?>


<p>
    Merci <?php echo $user_firstname . " " . $user_name ?> de nous avoir contacté à propos de <?php echo $user_subject ?>.
</p>
<p>
    Un de nos conseiller vous contactera soit à l’adresse <?php echo $user_email ?> ou par téléphone au <?php echo $user_tel ?> dans les plus brefs délais pour traiter votre demande : 
</p>
<p>
    <?php echo $user_messsage; ?>
</p>

<p>Le formulaire n'a pas été correctement rempli</p>
