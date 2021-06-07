<?php
if(isset($_GET['id']) && isset($_GET['token'])){
    require_once 'inc/db.php';
    require_once 'inc/functions.php';


    $req = $pdo->prepare('SELECT * FROM member WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'], $_GET['token']]);
    $member = $req->fetch();


    if($member){
        $errors = array();
        session();
        // Fields not empty
        if(!empty($_POST) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){
            // Password
            $pass = $_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $pass);
            $lowercase = preg_match('@[a-z]@', $pass);
            $number = preg_match('@[0-9]@', $pass);
            $specialChars = preg_match('@[^\w]@', $pass);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8 || strlen($pass) > 255){
                $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères dont au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial.';
            }

            // Password confirmation
            if($_POST['password'] != $_POST['password_confirm']){
                $errors['password_confirm'] = 'Les mots de passes ne correspondent pas';
            }


            // Informations sent to db
            if(empty($errors)){
                $password  = htmlspecialchars($_POST['password']);
                
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE member SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?')->execute([$password, $member->id]);
                if(isset($_SESSION['auth']) && $_SESSION['auth']->is_admin == 1){
                    $_SESSION['flash']['success'] = 'Le mot de passe de l\'utilisateur à été correctement modifié.';
                    header('Location: adm/potatodashboard.php');
                    exit;
                }else{
                    $_SESSION['auth'] = $member;
                    $_SESSION['flash']['success'] = 'Votre mot de passe à été correctement modifié.';
                    header('Location: account.php');
                    exit;
                }
            }
        }
    }else{
        $_SESSION['flash']['danger'] = 'Ce token est invalide.';
        header('Location: register.php');
        exit;
    }
}else{
    header('Location: register.php');
    exit;
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
        <h1 class="h3 mb-3 fw-normal">Réinitialisation du mot de passe</h1>
    
        <div class="form-floating">
          <input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe*" required>
          <label for="floatingPassword">Nouveau mot de passe</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password_confirm" class="form-control" placeholder="Confirmez le nouveau mot de passe*" required>
          <label for="floatingPassword">Confirmez le nouveau mot de passe</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Se connecter</button>
      </form>
</main>

<?php require 'inc/footer.php'; ?>