<?php
require 'inc/functions.php';
session();
require_once 'inc/db.php';

// Video player
if(!empty($_GET) && !empty($_GET['id_film'])){
    $id_film = htmlspecialchars($_GET['id_film']);
    $req = $pdo->prepare('SELECT * FROM film WHERE id = ?');
    $req->execute([$id_film]);
    if($req->rowCount() == 1){
        $film = $req->fetch();
    }else{
        $_SESSION['flash']['danger'] = 'Film introuvable.';
        header('Location: index.php');
        exit;
    }
}else{
    header('Location: index.php');
    exit;
}


// If already favorite
$exist = false;
if(!empty($_SESSION['auth'])){
    $id_user = $_SESSION['auth']->id;
    $req2 = $pdo->prepare('SELECT film_id FROM member_fav WHERE member_id = ?');
    $req2->execute([$id_user]);
    while($row = $req2->fetch(PDO::FETCH_ASSOC)){
        if(in_array($id_film, $row)){
            $exist = true;
        }
    }
}



?>


<?php require 'inc/header.php'; ?>

    <header class="navbar-margin header">
        <div class="extern-margin container-fluid">
            <h1 class="text-uppercase fw-bold h1"><?= $film->title ?></h1>
            <?php if($exist === false): ?>
            <a href="add_fav.php?id_film=<?= $film->id ?>" class="btn purple-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star me-2 mb-1" viewBox="0 0 18 18">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                Ajouter aux favoris
            </a>
            <?php else: ?>
            <a href="del_fav.php?id_film=<?= $film->id ?>" class="btn purple-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 18 18">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                Supprimer des favoris
            </a>
            <?php endif; ?>
        </div>
    </header>

    <main class="container-fluid extern-margin">
        <div class="row">
            <!-- LEFT PART -->
            <div class="col-8">
                <div class="mb-1 mx-3 d-flex justify-content-between">
                    <!-- season & episode number -->
                    <div class="text-start">
                        <h2 class="fs-3">Saison 1 : Episode 1</h2>
                    </div>
                    <!-- videoplayers links -->
                    <div class="text-end d-flex align-items-center">
                        <a href="#" class="btn purple-btn btn-sm me-2">Uptobox</a>
                        <a href="#" class="btn purple-btn btn-sm">Verystream</a>
                    </div>
                </div>
                <!-- videoplayer -->
                <div class="text-center mb-2">
                    <iframe width="960" height="540" src="<?= $film->url ?>" scrolling="no" frameborder="0" allowfullscreen webkitallowfullscreen></iframe>
                </div>
                <div class="purple-border-t row mx-3">
                    <!-- synopsis -->
                    <div class="col-6 px-0 mt-2">
                        <h3 class="fs-5 mb-1">Synopsis:</h3>
                        <p class="fs-6"><?= $film->synopsis ?></p>
                    </div>
                    <!-- directors and voice actors -->
                    <div class="col-6 mt-2">
                        <h3 class="fs-5 mb-1">Réalisateur(s) et Doubleurs:</h3>
                        <div class="d-flex justify-content-around">
                            <div class="text-center">
                                <img class="border-2 purple-border rounded-circle" width="80px" height="80px" alt="photo de profil" src="../src/img/popular-today/violet-evergarden.jpg">
                                <p class="fs-6 mt-1"><?= $film->actor ?></p>
                            </div>
                            <div class="text-center">
                                <img class="border-2 purple-border rounded-circle" width="80px" height="80px" alt="photo de profil" src="../src/img/popular-today/violet-evergarden.jpg">
                                <p class="fs-6 mt-1">Un Autre-Acteur</p>
                            </div>
                            <div class="text-center">
                                <img class="border-2 purple-border rounded-circle" width="80px" height="80px" alt="photo de profil" src="../src/img/popular-today/violet-evergarden.jpg">
                                <p class="fs-6 mt-1">Jeremy Vincienzo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RIGHT PART -->
            <div class="col-4 d-flex align-items-center">
                <div class="purple-border-l">
                    <h3 class="ms-3 fs-3 fw-bold">Films recommandés:</h3>
                    <div class="row my-4">
                        <div class="col-5 d-flex justify-content-center">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7 ps-0">
                            <h5 class="mb-2 fs-5 fw-bold">Princesse Mononoké</h5>
                            <p class="card-subtitle fs-6"><span class="purple">Dâte de sortie: </span>18 mars 2005</p>
                            <p class="card-subtilte fs-6 mb-2"><span class="purple">Durée: </span>1h 50min</p>
                            <p class="card-subtilte fs-6"><span class="purple">Description: </span>Un jeune homme rentre  chez lui après sa première année à l'université, il se...</p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-5 d-flex justify-content-center">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7 ps-0">
                            <h5 class="mb-2 fs-5 fw-bold">Princesse Mononoké</h5>
                            <p class="card-subtitle fs-6"><span class="purple">Dâte de sortie: </span>18 mars 2005</p>
                            <p class="card-subtilte fs-6 mb-2"><span class="purple">Durée: </span>1h 50min</p>
                            <p class="card-subtilte fs-6"><span class="purple">Description: </span>Un jeune homme rentre  chez lui après sa première année à l'université, il se...</p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-5 d-flex justify-content-center">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7 ps-0">
                            <h5 class="mb-2 fs-5 fw-bold">Princesse Mononoké</h5>
                            <p class="card-subtitle fs-6"><span class="purple">Dâte de sortie: </span>18 mars 2005</p>
                            <p class="card-subtilte fs-6 mb-2"><span class="purple">Durée: </span>1h 50min</p>
                            <p class="card-subtilte fs-6"><span class="purple">Description: </span>Un jeune homme rentre  chez lui après sa première année à l'université, il se...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



<?php require 'inc/footer.php'; ?>