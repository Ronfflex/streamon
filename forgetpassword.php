<?php
    if(!empty($_POST) && !empty($_POST['email'])){
        require_once 'inc/db.php';
        require_once 'inc/functions.php';


        // Email
        $email = htmlspecialchars(trim($_POST['email'])); // Voir si ok de ranger ca comme ca dans la bdd ?

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($email) < 3 || strlen($email) > 255){
            $errors['email'] = 'Email invalide.';
        }


        // Email exist
        $req = $pdo->prepare('SELECT * FROM member WHERE mail = ? AND confirmed_at IS NOT NULL');
        $req->execute([$_POST['email']]);
        $member = $req->fetch();

        if($member === false){
            $errors['email'] = 'Aucun compte n\'est enregistré avec ce mail ou le compte n\'a pas été confirmé. Dans le second cas, veuillez consulter vos mails (ainsi que vos spams).';
        }


        // Informations sent to db
        if(empty($errors)){
            session();
            $reset_token = str_random(60);
            $pdo->prepare('UPDATE member SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $member->id]);
            $_SESSION['flash']['success'] = 'Un mail pour changer de mot de passe vous a été envoyé.';
            mail($_POST['email'], 'Réinitialisation de votre mot de passe StreamOn.fr', "Afin de réinistialiser votre mot de passe, veuillez cliquer sur ce lien:\n\nhttp://streamon.fr/resetpassword.php?id={$member->id}&token=$reset_token");
            header('Location: register.php');
            exit;
        }
    }
?>



<?php require 'inc/header.php'; ?>

<!-- Show errors -->
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger navbar-margin">
        <p>Erreurs lors de l'inscription :</p>
        <ul>
        <?php foreach($errors as $error): ?>
            <li class="mt-2"><?= $error; ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
    
<main class="form-signin m-auto" style="max-width: 330px">
    <form action="" method="POST">
        <img src="src/img/navbar/Logo_StreamOn.svg" alt="Logo StreamOn" style="background-color: var(--light-shadow);">
        <h1 class="h3 mb-3 fw-normal">Se connecter</h1>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" placeholder="email@streamon.fr" required>
            <label for="floatingInput">Email</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="send">Envoyer</button>
    </form>
</main>


<?php require 'inc/footer.php'; ?>