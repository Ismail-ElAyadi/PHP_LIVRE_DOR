<?php
if(isset($_POST['username'],$_POST['message'])) {
    
} 
$title = "Livre d'or" ;
require 'elements/header.php';
?>
<div class="container">
    <h1>Livre d'or</h1>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control"name="username" placeholder="Votre pseudo" id="">  
        </div>
        <div class="form-group">
            <textarea name="message" id="" cols="30" rows="10"></textarea>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php 
require 'elements/footer.php';
?>