<?php
require_once __DIR__ .DIRECTORY_SEPARATOR. 'class' . DIRECTORY_SEPARATOR .'Message.php';
require_once __DIR__ .DIRECTORY_SEPARATOR. 'class' . DIRECTORY_SEPARATOR .'Alert.php';

$sucess_message = "Formulaire correcte";
$fail_message ="Formulaire incorrecte";
if(isset($_POST['username'],$_POST['message'])) {
    $message = new Message($_POST['username'],$_POST['message']);
    $alert = new Alert();
    if($message->isValid()){
        $alert->resetAlert(true,$sucess_message);

    }
    else{
        $alert->resetAlert(false,$fail_message);
    }
} 
$title = "Livre d'or" ;
require 'elements/header.php';
?>
<div class="container">
    <h1>Livre d'or</h1>
    <form class="col-12" action="" method="post">
        <?php if ($alert->isUsable()) :?>
            <div class="<?=  $alert->getClass() ?>">
                <?= $alert->getMessage()?>
            </div>

        <?php endif?>
        <p class="alert-danger"></p>
        <div class="col-xl-6 form-group">
            <label for="username">Pseudo</label>
            <input type="text" class="form-control"name="username" placeholder="Votre pseudo" id="">  
        </div>
        <div class="form-group col-12">
            <label for="message">Commentaire</label>
            <textarea  class="col-12" name="message" id="" cols="30" rows="10"></textarea>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php 
require 'elements/footer.php';
?>