<?php
require '../inc/functions.php';
admin_only();
require_once '../inc/db.php';

$edit_mod = false;

// EDIT
if(!empty($_GET) && !empty($_GET['id_film'])){
    $edit_mod = true;
    $id_film = htmlspecialchars($_GET['id_film']);
    $req = $pdo->prepare('SELECT * FROM film WHERE id = ?');
    $req->execute([$id_film]);
    
    if($req->rowCount() == 1){
        $film = $req->fetch();
    }else{
        $_SESSION['flash']['danger'] = 'Aucun film trouvé.';
        header('Location: potatodashboard.php');
        exit;
    }
}




// CREATION
if(!empty($_POST)) {
$errors = array();

    if(isset($_POST['add_film'])){
        if(!empty($_POST['filmName']) && !empty($_POST['url1']) && !empty($_POST['release']) && !empty($_POST['synopsis']) && !empty($_POST['actor'])){
            $film_name = htmlspecialchars($_POST['filmName']);
            $url1 = htmlspecialchars($_POST['url1']);
            $url2 = htmlspecialchars($_POST['url2']);
            $release = date('Y-m-d', strtotime($_POST['release']));
            $synopsis = htmlspecialchars($_POST['synopsis']);
            $actor = htmlspecialchars($_POST['actor']);
            $add_by = $_SESSION['auth']->username;
            
            if(empty($url2)){
                $url2 = NULL;
            }

            if($edit_mod === true){
                $req = $pdo->prepare('UPDATE film SET title = ?, url = ?, url2 = ?, release_date = ?, synopsis = ?, actor = ?, edit_date = NOW(), edit_by = ? WHERE id = ?');
                $req->execute([
                    $film_name,
                    $url1,
                    $url2,
                    $release,
                    $synopsis,
                    $actor,
                    $add_by,
                    $id_film
                ]);
                $_SESSION['flash']['success'] = 'Film modifié.';
                header('Location: add_film.php');
                exit;
            }else{
                $req = $pdo->prepare('INSERT INTO film (title, url, url2, release_date, synopsis, actor, add_date, add_by) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)');
                $req->execute([
                    $film_name,
                    $url1,
                    $url2,
                    $release,
                    $synopsis,
                    $actor,
                    $add_by
                ]);
                $_SESSION['flash']['success'] = 'Film ajouté.';
                header('Location: add_film.php');
                exit;
            }
        }else{
            $errors['fields'] = 'Veuillez remplir tous les champs obligatoires.';
        }
    }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page administrateur : Ajouter un film</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../src/css/main.css" rel="stylesheet">
    
    <!-- font-family: Verdana -->
</head>

<body>

    <!-- Show errors -->
    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger mb-0">
        <p>Erreurs lors de l'ajout du film :</p>
        <ul>
        <?php foreach($errors as $error): ?>
            <li class="mt-2"><?= $error; ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <!-- Show session -->
    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type; ?> fixed-top">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>


    <div class="extern-margin bg-light" style="height: 100vh">
        <h1 class="fs-1 mb-4 text-uppercase fw-bold">Ajouter un film</h1>
        <a href="../index.php" class="btn btn-primary mb-5">Acceuil</a>
        <a href="potatodashboard.php" class="btn btn-primary mb-5">Dashboard</a>
        
        <div class="row d-flex align-items-center">
            <!-- MINIATURE
            <form class="col-3" name="add_film" enctype="multipart/form-data" action="" method="post">
                MAX_FILE_SIZE détermine la taille max d'un fichier côté client et doit précéder l'input du fichier
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                Miniature : <input name="image" type="file" /><br>
                <input type="submit" name="send" value="Upload" />
            </form>
             -->
            <form action="" class="col-9 row py-3 px-2" method="POST">
                <div class="col-12 mb-3 ps-2 pe-1">
                    <label for="inputFilmName" class="text-uppercase fw-bold fs-5 mb-1">Titre du film*</label>
                    <input type="text" name="filmName" class="form-control py-2" id="inputFilmName" placeholder="Nom du film" value="<?= $film->title; ?>">
                </div>
                <div class="col-12 mb-3 ps-2 pe-1">
                    <label for="inputUrl1" class="text-uppercase fw-bold fs-5 mb-1">URL Uptobox*</label>
                    <input type="text" name="url1" class="form-control py-2" id="inputUrl1" placeholder="URL Uptobox" value="<?= $film->url; ?>">
                </div>
                <div class="col-12 mb-3 ps-2 pe-1">
                    <label for="inputUrl2" class="text-uppercase fw-bold fs-5 mb-1">URL VeryStream</label>
                    <input type="text" name="url2" class="form-control py-2" id="inputUrl2" placeholder="URL VeryStream" value="<?= $film->url2; ?>">
                </div>
                <div class="col-12 mb-3 ps-2 pe-1">
                    <label for="inputRelease" class="text-uppercase fw-bold fs-5 mb-1">Date de sortie*</label>
                    <input type="date" name="release" class="form-control py-2" id="inputRelease" value="<?= $film->release_date; ?>">
                </div>
                <div class="col-12 mb-3 ps-2 pe-1">
                    <label for="inputSynospis" class="text-uppercase fw-bold fs-5 mb-1">Synopsis*</label>
                    <textarea name="synopsis" class="form-control py-2" id="inputSynospis" placeholder="Synopsis"><?= $film->synopsis; ?></textarea>
                </div>
                <div class="col-12 mb-3 ps-2 pe-1">
                    <label for="inputActor" class="text-uppercase fw-bold fs-5 mb-1">Réalisateur(s) et Doubleurs*</label>
                    <input type="text" name="actor" class="form-control py-2" id="inputActor" placeholder="Réalisateur(s) et Doubleurs" value="<?= $film->actor; ?>">
                </div>
                <div class="col-12 mb-3 ps-2 pe-1">
                    <input type="submit" name="add_film" value="Ajouter">
                </div>
            </form>
            <!-- Enregistrer
            <div class="mt-2 px-1 text-center">
                <button class="btn btn-lg purple-btn text-uppercase fw-bold p-0 fs-5 w-50">
                    <a href="#" class="white-text d-flex py-3" style="padding: 0 44.24%;">Ajouter</a>
                </button>
            </div>
            -->
        </div>
    </div>



</body>