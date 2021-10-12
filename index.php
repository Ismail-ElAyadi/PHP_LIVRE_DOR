<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Alert.php';

$sucess_form = "Formulaire correcte";
$fail_form = "Formulaire incorrecte";
$error = null;
if (isset($_POST['username'], $_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);

    $alert = null;
    if ($message->isValid()) {
        $error = [];
        $alert= new Alert(true, $sucess_form);
    } else {
        $alert= new Alert(false, $fail_form);
        $error = $message->getErrors();
    }
}

$title = "Livre d'or";
require 'elements/header.php';
?>
<div class="container">
    <h1>Livre d'or</h1>
    <form class="col-12" action="" method="post">
        <?php if (isset($alert) && $alert->isUsable()) : ?>
            <div class="<?= $alert->getClass() ?>">
                <?= $alert->getMessage() ?>
            </div>
        <?php endif ?>

        <div class="col-xl-6 form-group">
            <label for="username">Pseudo</label>
            <?php if (isset($error["username"])) : ?>
                <?php $username_error = new Alert(false, $error["username"]); ?>
                <p class="<?= $username_error->getClass() ?>">
                    <?= $username_error->getMessage(); ?>
                </p>
            <?php endif ?>

            <input type="text" class="form-control" name="username" placeholder="Votre pseudo" id="">
        </div>

        <div class="form-group col-12">
            <label for="message">Commentaire</label>
            <?php if (isset($error["message"])) : ?>
                <?php $message_error = new Alert(false, $error["message"]); ?>
                <p class="<?= $message_error->getClass() ?>">
                    <?= $message_error->getMessage(); ?>
                </p>

            <?php endif ?>
            <textarea class="col-12" name="message" id="" cols="30" rows="10"></textarea>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php
require 'elements/footer.php';
?>