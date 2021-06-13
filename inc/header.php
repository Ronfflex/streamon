<!DOCTYPE html>
<?php require_once 'inc/db.php'; ?>
<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}


// SEARCH BAR
if (!empty($_GET) && !empty($_GET['search'])) {
    $search = "%".htmlspecialchars($_GET['search'])."%";
    $film = $pdo->prepare("SELECT id, title FROM film WHERE title LIKE ? ORDER BY title ASC");
    $film->execute([$search]);
    if($film->rowCount() < 1){
        $_SESSION['flash']['danger'] = 'Aucun contenu trouvé.';
        header('Location: catalog.php');
        exit;
    }
}


?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamOn</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../src/img/favicon/favicon.ico">

    <!-- meta SEO -->
    <meta name="description" content="StreamOn est un site de streaming en ligne légal regroupant une grande variété d’animations françaises et japonaises. Vous y retrouverez un catalogue contenant le meilleur de l’anime en film et en série !">
    
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../src/css/main.css" rel="stylesheet">
    
    <!-- font-family: Verdana -->
</head>



<body class="light">
    <!-- PRINCIPAL NAVBAR -->
    <nav class="navbar navbar-dark fixed-top purple-bg">
        <div class="container-fluid my-container">
            
            <!-- Menu button -->
            <button class="btn d-block border-0 me-2" id="menu-btn" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="d-flex flex-grow-1 justify-content-between">
                <!-- StreamOn logo-->
                <a class="navbar-brand" href="../index.php">
                    <img src="../src/img/navbar/Logo_StreamOn.svg" alt="Logo StreamOn" width="auto" height="45px">
                </a>
                
                <div class="d-flex">
                    <!-- Themes button -->
                    <div class="d-flex align-items-center">
                        <div class="form-check mx-4 mb-0 p-0 form-switch">
                            <input class="form-check-input ms-0" type="checkbox" id="theme">
                        </div>
                    </div>
                    <!-- Search bar -->
                    <form action="catalog.php" method="GET" class="d-flex custom-rounded-nav me-2">
                        <input class="form-control border-0" style="background-color: var(--light-shadow); color: var(--bg-primary-color);" type="search" name="search" placeholder="Rechercher" aria-label="Rechercher">
                        <button class="btn nav-btn" style="background-color: var(--light-shadow);" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search white-text" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
                
                <!-- Bouton profil -->
            <?php if(isset($_SESSION['auth'])): ?>
                <button class="btn d-block border-0 me-2 d-flex align-items-center nav-link" id="menu-btn-right" type="button">
                    <p class="mb-0 me-2 fw-bold white-text"><?= $_SESSION['auth']->username; ?></p>
                    <img class="border border-2 border-dark rounded-circle" width="40px" height="40px" alt="photo de profil" src="../src/img/popular-today/violet-evergarden.jpg">
                </button>
            <?php else: ?>
                <a href="../register.php" class="nav-link rounded-3 white-text">S'inscrire / Se connecter</a>
            <?php endif; ?>
        </div>
    </nav>


    <!-- LEFT NAVBAR-->
    <div class="p-4 navbar-custom" id="sidebar">
        <!-- Search bar -->
        <form action="catalog.php" method="GET" class="d-flex mt-2 mb-5 custom-rounded-nav">
            <input class="form-control border-0 py-3" style="background-color: var(--light-shadow); color: var(--bg-primary-color);" type="search" name="search" placeholder="Recherher" aria-label="Recherher">
            <button class="btn nav-btn" style="background-color: var(--light-shadow);" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search icone" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
        <!-- Links -->
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <a href="../index.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase">Accueil</a>
            </li>
            <li class="border-top my-2"></li>
            <li class="mb-1">
                <a class="nav-link svg90 d-flex justify-content-between align-items-center fw-bold ps-1 fs-5 text-uppercase" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    <span>catalogue</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right svg-90" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </a>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal ps-4 pb-1">
                        <li><a href="../catalog.php" class="nav-link py-1">Anime</a></li>
                        <li><a href="../catalog.php" class="nav-link py-1">Saisons</a></li>
                        <li><a href="../catalog.php" class="nav-link py-1">Genre</a></li>
                        <li><a href="../catalog.php" class="nav-link py-1">Année</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-2"></li>
            <li class="mb-1">
                <a href="../watchlist.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase">Ma Watchlist</a>
            </li>
            <li class="border-top my-2"></li>
            <li class="mb-1">
                <a href="../discover.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase">Nos Offres</a>
            </li>
            <li class="border-top my-2"></li>
            <li class="mt-4">
                <!-- Facebook -->
                <a href="https://www.facebook.com/" target="_blank" class="mb-0 px-2 m-1 icone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a>
                <!-- Instagram -->
                <a href="https://www.instagram.com/" target="_blank" class="mb-0 px-2 m-1 icone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>
                <!-- Twitter -->
                <a href="https://twitter.com/" target="_blank" class="mb-0 px-2 m-1 icone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                </a>
                <!-- Discord -->
                <a href="https://discord.com/" target="_blank" class="mb-0 px-2 icone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                        <path d="M6.552 6.712c-.456 0-.816.4-.816.888s.368.888.816.888c.456 0 .816-.4.816-.888.008-.488-.36-.888-.816-.888zm2.92 0c-.456 0-.816.4-.816.888s.368.888.816.888c.456 0 .816-.4.816-.888s-.36-.888-.816-.888z"/>
                        <path d="M13.36 0H2.64C1.736 0 1 .736 1 1.648v10.816c0 .912.736 1.648 1.64 1.648h9.072l-.424-1.48 1.024.952.968.896L15 16V1.648C15 .736 14.264 0 13.36 0zm-3.088 10.448s-.288-.344-.528-.648c1.048-.296 1.448-.952 1.448-.952-.328.216-.64.368-.92.472-.4.168-.784.28-1.16.344a5.604 5.604 0 0 1-2.072-.008 6.716 6.716 0 0 1-1.176-.344 4.688 4.688 0 0 1-.584-.272c-.024-.016-.048-.024-.072-.04-.016-.008-.024-.016-.032-.024-.144-.08-.224-.136-.224-.136s.384.64 1.4.944c-.24.304-.536.664-.536.664-1.768-.056-2.44-1.216-2.44-1.216 0-2.576 1.152-4.664 1.152-4.664 1.152-.864 2.248-.84 2.248-.84l.08.096c-1.44.416-2.104 1.048-2.104 1.048s.176-.096.472-.232c.856-.376 1.536-.48 1.816-.504.048-.008.088-.016.136-.016a6.521 6.521 0 0 1 4.024.752s-.632-.6-1.992-1.016l.112-.128s1.096-.024 2.248.84c0 0 1.152 2.088 1.152 4.664 0 0-.68 1.16-2.448 1.216z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    

    <?php if(isset($_SESSION['auth'])): ?>
    <!-- RIGHT NAVBAR -->
    <div class="p-4 navbar-custom navbar-custom-right" id="sidebar-right">
        <!-- Profil -->
        <div class="card border border-1" style="border-color: var(--bg-pc)!important;">
            <img src="../src/img/popular-today/violet-evergarden.jpg" class="card-img" alt="Image de profil">
            <div class="position-absolute start-0 end-0 bottom-0 px-3 py-5 h-25" style="background-color: #000000b0">
              <h5 class="card-title position-absolute bottom-0 start-0 mb-5 ms-2 fw-bold icone"><?= $_SESSION['auth']->username; ?></h5>
              <p class="card-text position-absolute bottom-0 start-0 mb-2 ms-2 icone">
                <?php if($_SESSION['auth']->status == 0): ?>Offre gratuite<?php endif; ?>
                <?php if($_SESSION['auth']->status == 1): ?>Offre prenium<?php endif; ?>
              </p>
            </div>
        </div>
        <!-- Links -->
        <ul class="list-unstyled ps-0 pt-4">
            <?php if($_SESSION['auth']->is_admin == 1): ?>
            <li class="mb-1">
                <a href="../adm/potatodashboard.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase text-danger">Administration</a>
            </li>
            <li class="border-top my-2"></li>
            <?php endif; ?>
            <li class="mb-1">
                <a href="../profile.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase">Ma page</a>
            </li>
            <li class="border-top my-2"></li>
            <li class="mb-1">
                <a href="../account.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase">Mon compte</a>
            </li>
            <li class="border-top my-2"></li>
            <li class="mb-1">
                <a href="../credit.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase">Mes crédits</a>
            </li>
            <li class="border-top my-2"></li>
            <li class="mb-1">
                <a href="../newsletter.php" class="nav-link fw-bold ps-1 fs-5 text-uppercase">Gérer ma Newsletter</a>
            </li>
            <li class="border-top my-2"></li>
            <li class="mb-1">
                <a href="../logout.php" class="nav-link fw-bold ps-1 fs-6 text-end text-decoration-underline text-uppercase" style="color: var(--light-shadow);">Déconnexion</a>
            </li>
        </ul>
    </div>
    <?php endif; ?>


    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type; ?> navbar-margin fixed-top">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>