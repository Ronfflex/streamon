<?php
require '../inc/functions.php';
admin_only();
require_once '../inc/db.php';

// For date
setlocale(LC_TIME, 'fr_FR');


$edit_mod = false;

// EDIT MODE => TRUE
if(!empty($_GET) && !empty($_GET['id_film'])){
    $edit_mod = true;
    $id_film = htmlspecialchars($_GET['id_film']);
    $req = $pdo->prepare('SELECT * FROM film WHERE id = ?');
    $req->execute([$id_film]);
    // Check if film to modify exist
    if($req->rowCount() == 1){
        $film = $req->fetch();
    }else{
        $_SESSION['flash']['danger'] = 'Aucun film trouvé.';
        header('Location: potatodashboard.php');
        exit;
    }
}


if(!empty($_POST)) {
$errors = array();

    // ADD FILM
    if(isset($_POST['add_film'])){
        // Fields not empty
        if(empty($_POST['filmName']) || empty($_POST['url1']) || empty($_POST['release']) || empty($_POST['synopsis']) || empty($_POST['actor'])){
            $errors['fields'] = 'Veuillez remplir tous les champs obligatoires.';
        }else{
            // Clean
            $film_name = ucwords(htmlspecialchars(trim($_POST['filmName'])));
            $url1 = htmlspecialchars(trim($_POST['url1']));
            $url2 = htmlspecialchars(trim($_POST['url2']));
            $release = date('Y-m-d', strtotime($_POST['release']));
            $synopsis = htmlspecialchars(trim($_POST['synopsis']));
            $actor = htmlspecialchars(trim($_POST['actor']));
            $add_by = $_SESSION['auth']->username;
            // Valid Characters
            $filter_char = '/^[a-zA-Z0-9\.\…\?\!\,\;\'\’\:\-\+\éÉèÈàÀâÂûÛêÊùÙçÇïÏîÎôÔ\ ]*$/';


            // Title
            if(strlen($film_name) < 1 || strlen($film_name) > 70){
                $errors['film_longer'] = 'Le titre du film doit faire un maximum de 70 caractères.';
            }
            if(!preg_match($filter_char, $_POST['filmName'])){
                $errors['film_char'] = 'Le titre contient un ou plusieurs caractère(s) invalide(s).';
            }


            // Url
            $url1_verify = filter_var($_POST['url1'], FILTER_VALIDATE_URL) && preg_match('/^https\:\/\/uptostream\.com\/iframe\/[a-zA-Z0-9_]+$/', $_POST['url1']);
            //$url2_verify = filter_var($_POST['url2'], FILTER_VALIDATE_URL) && preg_match('/^https\:\/\/uptostream\.com\/iframe\/[a-z0-9_]*$/', $_POST['url2']);
            $url2_verify = filter_var($_POST['url2'], FILTER_VALIDATE_URL) && preg_match('/^http(s|)\:\/\/[a-zA-Z0-9]+\.[a-zA-Z]+\/[a-zA-Z0-9_\/=?&-]*$/', $_POST['url2']);
            $url1_long = (strlen($url1) < 35 || strlen($url1) > 255);   $url1_longu = (strlen($url1) > 35 && strlen($url1) < 255);
            $url2_long = (strlen($url2) < 15 || strlen($url2) > 255);   $url2_longu = (strlen($url2) > 15 && strlen($url2) < 255);

            if((!$url1_verify || $url1_long) && ($url2 === NULL || ($url2_verify && $url2_longu))){
                $errors['url'] = 'URL Uptostream invalide.';
            }elseif((!$url2_verify || $url2_long) && ($url1_verify && $url1_longu) && $url2 != NULL){
                $errors['url'] = 'URL secondaire invalide.';
            }elseif(((!$url1_verify || $url1_long) && (!$url2_verify || $url2_long)) && $url2 != NULL){
                $errors['url'] = 'Plusieurs URL invalides.';
            }
 

            // Date
            //$vfar = date('d-m-Y', strtotime($_POST['release']));
            //$filter_date = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/';
            //if(!preg_match('/#(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)#/', $vfar)){
            //    $errors['date'] = 'Date invalide.';
            //}


            // Synopsys
            if(strlen($synopsis) < 20 || strlen($synopsis) > 1000){
                $errors['synopsis_longer'] = 'Le synopsis du film doit contenir entre 20 et 1000 caractères.';
            }
            if(!preg_match($filter_char, $_POST['synopsis'])){
                $errors['synopsis_char'] = 'Le synopsis contient un ou plusieurs caractère(s) invalide(s).';
            }


            // Actor
            if(strlen($actor) < 2 || strlen($actor) > 50){
                $errors['actor_longer'] = 'Le(s) réalisateur(s) et doubleur(s) doivent faire un maximum de 50 caractères.';
            }
            if(!preg_match($filter_char, $_POST['actor'])){
                $errors['actor_char'] = 'Le(s) réalisateur(s) et doubleur(s) contiennent un ou plusieurs caractère(s) invalide(s).';
            }


            // ADD NEW FILM
            if($edit_mod === false){
                // Miniature exist
                if(!isset($_FILES['miniature']) || empty($_FILES['miniature']['name'])){
                    $errors['img'] = 'La miniature est obligatoire.';
                // Miniature format
                }elseif(isset($_FILES['miniature']) && !empty($_FILES['miniature']['name']) && exif_imagetype($_FILES['miniature']['tmp_name']) != 2){
                    $errors['img_type'] = 'La miniature doit obligatoirement être au format: .jpg';
                }


                // Informations sent to db
                if(empty($errors)){
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
                    // image upload
                    $lastid = $pdo->lastInsertId();
                    $path = '../src/img/film/' . "$lastid" . '.jpg';
                    move_uploaded_file($_FILES['miniature']['tmp_name'], $path);

                    $_SESSION['flash']['success'] = 'Film ajouté.';
                    header('Location: add_film.php');
                    exit;
                }
            }else{
                // EDIT FILM

                // Informations sent to db
                if(empty($errors)){
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
                    header('Location: potatodashboard.php');
                    exit;
                }
            }
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
        <h1 class="fs-1 mb-4 text-uppercase fw-bold"><?php if($edit_mod === false): ?>Ajouter<?php else: ?>Modifier<?php endif; ?> un film</h1>
        <a href="../index.php" class="btn btn-primary mb-5">Acceuil</a>
        <a href="potatodashboard.php" class="btn btn-primary mb-5">Dashboard</a>
        
        
            <form action="" class="d-flex row align-items-center py-3 px-2" method="POST" enctype="multipart/form-data">
                <div class="row col-9">
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
                    
                    <!-- Add button -->
                    <div class="col-12 mt-3 ps-2 pe-1">
                        <button type="submit" name="add_film" value="Ajouter" class="btn btn-lg purple-btn text-uppercase fw-bold py-1 px-3 fs-5"><?php if($edit_mod === false): ?>Ajouter<?php else: ?>Modifier<?php endif; ?> le film</button>
                    </div>
                </div>

                <!-- miniature -->
                <div class="col-3">
                <?php if($edit_mod === false): ?>
                    <label for="inputeMiniature" class="text-uppercase fw-bold fs-5 mb-1">Miniature*</label><br>
                    <!-- MAX_FILE_SIZE must precede the file input field -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                    <input type="file" name="miniature" id="inputeMiniature">
                <?php else: ?>
                    <img src="../src/img/film/<?= $film->id; ?>.jpg" class="img-fluid shadow">
                <?php endif; ?>
                </div>


            </form>
    </div>



</body>