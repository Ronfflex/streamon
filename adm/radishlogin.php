<?php 
  $errors = array();
  // LOGIN
  if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once '../inc/functions.php';
    require_once '../inc/db.php';
    $req = $pdo->prepare('SELECT * FROM member WHERE (username = :username OR mail = :username) AND confirmed_at IS NOT NULL');
    $req->execute(['username' => $_POST['username']]);
    $member = $req->fetch();
    if(password_verify($_POST['password'], $member->password)){
      session_start();
      $_SESSION['auth'] = $member;
      $_SESSION['flash']['success'] = 'Vous êtes bien connecté.';
      header('Location: potatodashboard.php');
      exit();
    }else{
      $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte.';
    }
  }
?>

<?php require '../inc/header.php'; ?>

<div class="text-center d-flex">

<?php if(!empty($errors)): ?>
  <div class="alert alert-danger navbar-margin">
    <p>Erreurs lors de l'inscription :</p>
    <ul>
      <?php foreach($errors as $error): ?>
        <li><?= $error; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

</div>
    
    <!-- FORM -->
    <div class="container-fluid w-75 mx-auto border border-secondary dark-bg" style="margin: 22.05vh 0; padding: 4rem 0;">
        <!-- Register -->
        <div class="row">
            
            <!-- Login -->
            <main class="col px-5">
                <form action="" method="POST">
                    <h2 class="mb-2 fw-bold fs-1">Se connecter</h2>
                    
                    <div class="row pt-5 pb-4">
                        <div class="col-12 mb-5 ps-2 pe-1">
                            <label for="inputEmailLogin" class="fw-bold fs-6 mb-1">Email ou nom d'utilisateur</label>
                            <input type="text" name="username" class="form-control py-2" id="inputEmailLogin" placeholder="email@streamon.fr" required>
                        </div>
                        <div class="col-12 ps-2 pe-1">
                            <label for="inputPasswordLogin" class="fw-bold fs- mb-1">Mot de passe</label>
                            <input type="password" name="password" class="form-control py-2 mb-2" id="inputPasswordLogin" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg py-4 px-5 purple-btn" type="submit" name="login">Se connecter</button>
                    </div>
                </form>
            </main>
        </div>
    </div>


<?php require '../inc/footer.php'; ?>