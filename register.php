<?php 
require_once 'inc/functions.php';
session();
reconnect_from_cookie();
if(isset($_SESSION['auth'])){
  header('Location: index.php');
  exit;
}
require_once 'inc/db.php';

if(!empty($_POST)) {
  $errors = array();

  // REGISTER
  if(isset($_POST['register'])){
    // Username
    if(empty($_POST['username']) || !preg_match('/^[a-z0-9A-Z_]+$/', $_POST['username'])){
      $errors['username'] = "Pseudo invalide";
    } else {
      $req = $pdo->prepare('SELECT id FROM member WHERE username = ?');
      $req->execute([$_POST['username']]);
      $member = $req->fetch();
      if($member){
        $errors['username'] = 'Ce pseudo est déjà utilisé';
      }
    }
    // Email
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors['email'] = 'Email invalide';
    } else {
      $req = $pdo->prepare('SELECT id FROM member WHERE mail = ?');
      $req->execute([$_POST['email']]);
      $mail = $req->fetch();
      if($mail){
        $errors['email'] = 'Un compte est déjà enregistré avec ce mail';
      }
    }
    // Password
    if(empty($_POST['password']) || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,50}$/", $_POST['password'])){
      $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères dont au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial @$!%*?&';
    }
    // Password confirmation
    if(empty($_POST['password_confirm']) || $_POST['password'] != $_POST['password_confirm']){
      $errors['password_confirm'] = 'Les mots de passes ne correspondent pas';
    }
    // Informations sent to db
    if(empty($errors)){
      $username = htmlspecialchars($_POST['username']);
      $pwd = htmlspecialchars($_POST['password']);
      $mail = htmlspecialchars($_POST['email']);

      $req = $pdo->prepare('INSERT INTO member (username, password, mail, confirmation_token) VALUES (?, ?, ?, ?)');
      $pwd = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $token = str_random(60);
      $req->execute([
        $username,
        $pwd,
        $mail,
        $token
        ]);
        $member_id = $pdo->lastInsertId();
        mail($_POST['email'], 'Confirmation de votre compte', "Afin de confirmer votre inscription, merci de cliquer sur ce lien:\n\nhttp://streamon.fr/confirm.php?id=$member_id&token=$token");
        $_SESSION['flash']['success'] = 'Un mail de confirmation permettant la validation de votre compte a été envoyé.';
        header('Location: register.php');
        exit;
      }
    }
    // LOGIN
    if(isset($_POST['login'])){
      if(!empty($_POST['username']) && !empty($_POST['password']) && empty($_POST['email']) && empty($_POST['password_confirm'])){
        $username = htmlspecialchars($_POST['username']);
        $pwd = htmlspecialchars($_POST['password']);
        $mail = htmlspecialchars($_POST['email']);

        $req = $pdo->prepare('SELECT * FROM member WHERE (username = :username OR mail = :username)');
        $req->execute(['username' => $_POST['username']]);
        $member = $req->fetch();
        if($member){
          // Banned
          if($member->confirmation_token == 'BANNED' && password_verify($_POST['password'], $member->password)){
            $errors['banned'] = 'Vous avez été banni.';
          // Unconfirmed
          }elseif($member->confirmed_at == NULL && password_verify($_POST['password'], $member->password)){
            $errors['confirmed'] = 'Veuillez consulter vos mails afin de confirmer votre compte.';
          // Connection
          }elseif(password_verify($_POST['password'], $member->password)){
              $_SESSION['auth'] = $member;
              $_SESSION['flash']['success'] = 'Vous êtes bien connecté.';
              if($_POST['remember'] && $member->is_admin != 1){
                $remember_token = str_random(250); 
                $pdo->prepare('UPDATE  member SET remember_token = ? WHERE id = ?')->execute([$remember_token, $member->id]);
                setcookie('remember', $member->id . '==' . $remember_token . sha1($member->id . 'pourlagloire'), strtotime('+7 days'));
              }
              if($member->is_admin == 1){
                header('Location: adm/potatodashboard.php');
                exit;
              }else{
                header('Location: index.php');
                exit;
              }
            }else{
              $errors['login'] = 'Identifiant ou mot de passe incorrecte.';
            }
          }else{
            $errors['login'] = 'Identifiant ou mot de passe incorrecte.';
          }
        }
      }
    }
?>


<?php require 'inc/header.php'; ?>

<div class="text-center d-flex">

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

</div>
    
    <!-- FORMS -->
    <div class="container-fluid w-75 mx-auto border border-secondary dark-bg" style="margin: 22.05vh 0; padding: 4rem 0;">
        <!-- REGISTER -->
        <div class="row">
            <main class="col-8 px-5 border-end">
                <form action="" method="POST">
                    <h1 class="mb-2 fw-bold fs-1">S'inscrire gratuitement</h1>
                    <h3 class="fs-6">Merci de rejoindre StreamOn !</h3>
                    
                    <div class="row py-5">
                        <div class="col-6 mb-5 ps-2 pe-1">
                            <label for="inputEmail" class="fw-bold fs-6 mb-1">Adresse Email</label>
                            <input type="email" name="email" class="form-control py-2" id="inputEmail" placeholder="email@streamon.fr" required>
                        </div>
                        <div class="col-6 mb-5 px-1">
                            <label for="inputPseudo" class="fw-bold fs-6 mb-1">Pseudo</label>
                            <input type="text" name="username" class="form-control py-2" id="inputPseudo" placeholder="Pseudo" required>
                        </div>
                        <div class="col-6 px-1 ps-2">
                            <label for="inputPassword" class="fw-bold fs-6 mb-1">Mot de passe</label>
                            <input type="password" name="password" class="form-control py-2" id="inputPassword" placeholder="Mot de passe" required>
                        </div>
                        <div class="col-6 px-1">
                            <label for="inputPasswordConfirm" class="fw-bold fs-6 mb-1">Confirmez le mot de passe</label>
                            <input type="password" name="password_confirm" class="form-control py-2" id="inputPasswordConfirm" placeholder="Confirmez le mot de passe" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg py-4 px-5 purple-btn" type="submit" name="register">Créer un compte</button>
                    </div>
                    <p class="fs-6 text-center mx-4 my-4">En cliquant sur "Créer un compte" ci-dessus, vous acceptez les Conditions de Service et la Politique de Confidentialité.</p>
                </form>
            </main>
            
            
            <!-- LOGIN -->
            <main class="col px-5">
                <form action="" method="POST">
                    <h2 class="mb-2 fw-bold fs-1">Se connecter</h2>
                    <h3 class="fs-6">Vous avez déjà un compte ? Connectez-vous ci-dessous.</h3>
                    
                    <div class="row pt-5 pb-4">
                        <div class="col-12 mb-5 ps-2 pe-1">
                            <label for="inputEmailLogin" class="fw-bold fs-6 mb-1">Email ou nom d'utilisateur</label>
                            <input type="text" name="username" class="form-control py-2" id="inputEmailLogin" placeholder="email@streamon.fr" required>
                        </div>
                        <div class="col-12 ps-2 pe-1">
                            <label for="inputPasswordLogin" class="fw-bold fs- mb-1">Mot de passe</label>
                            <input type="password" name="password" class="form-control py-2 mb-2" id="inputPasswordLogin" placeholder="Mot de passe" required>
                            <div class="text-end">
                                <a href="forgetpassword.php" class="purple">Mot de passe oublié ?</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg py-4 px-5 purple-btn" type="submit" name="login">Se connecter</button>
                    </div>
                    <div class="checkbox mb-3 mt-2 text-center">
                        <label>
                            <input type="checkbox" value="remember-me" name="remember"> Se souvenir de moi
                        </label>
                    </div>
                </form>
            </main>
        </div>
    </div>


<?php require 'inc/footer.php'; ?>