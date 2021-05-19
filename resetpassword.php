<?php
if(isset($_GET['id']) && isset($_GET['token'])){
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    $req = $pdo->prepare('SELECT * FROM member WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'], $_GET['token']]);
    $member = $req->fetch();
    if($member){
        if(!empty($_POST)){
            if(!empty($_POST['password']) && preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE member SET password = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
                session_start();
                $_SESSION['flash']['success'] = 'Votre mot de passse a été modifié correctement.';
                $_SESSION['auth'] = $member;
                header('Location: account.php');
                exit();
            }
        }
    }else{
        session_start();
        $_SESSION['flash']['danger'] = "Ce token est invalide";
        header('Location: register.php');
        exit();
    }
}else{
    header('Location: register.php');
    exit();
}

?>
<?php require 'inc/header.php'; ?>

<main class="form-signin m-auto" style="max-width: 330px">
        <form action="" method="POST">
        <img src="src/img/navbar/Logo_StreamOn.svg" alt="Logo StreamOn" style="background-color: var(--light-shadow);">
        <h1 class="h3 mb-3 fw-normal">Réinitialisation du mot de passe</h1>
    
        <div class="form-floating">
          <input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe" required>
          <label for="floatingPassword">Nouveau mot de passe</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password_confirm" class="form-control" placeholder="Confirmez le nouveau mot de passe" required>
          <label for="floatingPassword">Confirmez le nouveau mot de passe</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Se connecter</button>
      </form>
</main>

<?php require 'inc/footer.php'; ?>