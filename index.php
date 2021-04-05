<?php 

require_once './class/Message.php'; 


$errors = null;
if(isset($_POST['username'], $_POST['message'])){

$message = new Message($_POST['username'], $_POST['message']);


if($message->isValid()) {



} else {
    $errors = $message->getErrors();
}

}

$title = "livre d'or" ; ?>

<?php require './element/header.php' ?>


<div class="container">

    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        Formulaire invalide
    </div>
    <?php endif ?>

    <form action="" method="post">
        <div class="form-group mt-4 mb-4">
            <input value="<?= htmlentities($_POST['username']) ?? '' ?>" type="text" name="username" placeholder="Votre pseudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
            <?php if(isset($errors['username'])): ?>
            <div class="invalid-feedback"><?= $errors['username'] ?></div>
            <?php endif ?>
        </div>
        <div class="form-group mt-2 mb-4">
            <textarea  name="message" placeholder="Votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= htmlentities($_POST['message']) ?? '' ?></textarea>
            <?php if(isset($errors['message'])): ?>
            <div class="invalid-feedback"><?=$errors['message'] ?></div>
            <?php endif ?>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>



</div>



<?php require './element/footer.php' ; ?>