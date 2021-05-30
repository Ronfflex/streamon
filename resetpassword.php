<?php
if(isset($_GET['id']) && isset($_GET['token'])){
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    $req = $pdo->prepare('SELECT * FROM member WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'], $_GET['token']]);
    $member = $req->fetch();
    if($member){
        if(!empty($_POST)){
            // Minimum eight characters, at least one upper case English letter, one lower case English letter, one number and one special character
            if(!empty($_POST['password']) && preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/', $_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE member SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?')->execute([$password, $member->id]);
                session();
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
            }else{
                session();
                $_SESSION['flash']['danger'] = "Ce token est invalide";
            }
        }
    }else{
        session();
        $_SESSION['flash']['danger'] = "Ce token est invalide";
        header('Location: register.php');
        exit;
    }
}else{
    header('Location: register.php');
    exit;
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