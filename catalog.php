<?php require 'inc/header.php'; ?>
<?php require_once 'inc/db.php'; ?>
<?php



// Poster
$film = $pdo->prepare('SELECT id, title FROM film ORDER BY RAND() LIMIT 24');
$film->execute();

// GENRE
$genre = $pdo->prepare('SELECT * FROM category ORDER BY genre');
$genre->execute();
if(!empty($_GET) && !empty($_GET['genre'])){
    // Genre search engine
    $get_genre = htmlspecialchars($_GET['genre']);
    $film = $pdo->prepare("SELECT id, title FROM film WHERE genre = ? ORDER BY id");
    $film->execute([$get_genre]);
    if($film->rowCount() < 1){
        $_SESSION['flash']['danger'] = 'Aucun contenu de ce genre trouvé.';
        header('Location: catalog.php');
        exit;
    }
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

<header class="navbar-margin header">
    <div class="extern-margin container-fluid">
        <h1 class="text-uppercase fw-bold h1">Catalogue</h1>
    </div>
</header>
<main class="container-fluid extern-margin pt-5">
    <h3 class="text-uppercase fw-bold fs-4 mb-3 dark-text">Recherche d'animes</h3>
    <section class="d-flex mb-4">
        <form action="" method="GET" class="d-flex custom-rounded-nav col-2 me-4">
            <input class="form-control border-0 search-color" type="search" name="search" placeholder="Recherher" aria-label="Recherher">
            <button class="btn search-btn-color" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
        <div class="dropdown">
            <button class="btn btn-lg dark-bg text dropdown-toggle me-2 fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Type </button>
            <ul class="dropdown-menu dark-bg" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item dark-bg text" href="#">Séries</a></li>
              <li><a class="dropdown-item dark-bg text" href="#">Films</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-lg dark-bg text dropdown-toggle me-2 fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><?php if($get_genre != NULL){echo "Genre: $get_genre ";}else{echo "Genre ";} ?></button>
            <ul class="dropdown-menu dark-bg" aria-labelledby="dropdownMenuButton1">
                <?php while($genres = $genre->fetch()): ?>
                <li><a class="dropdown-item dark-bg text" href="catalog.php?genre=<?= $genres->genre; ?>"><?= $genres->genre; ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-lg dark-bg text dropdown-toggle me-2 fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Année </button>
            <ul class="dropdown-menu dark-bg" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item dark-bg text" href="#">2021</a></li>
              <li><a class="dropdown-item dark-bg text" href="#">2020</a></li>
              <li><a class="dropdown-item dark-bg text" href="#">2019</a></li>
              <li><a class="dropdown-item dark-bg text" href="#">2018</a></li>
            </ul>
        </div>
        <button type="button" class="btn dark-bg align-items-center"><a href="catalog.php">Réinitialiser les filtres</a></button>
    </section>
    <section class="row">
        <?php while($films = $film->fetch()): ?>
            <div class="col-2">
                <a href="../anime.php?id_film=<?= $films->id; ?>" class="card m-3 border-0 bg-transparent">
                    <img src="src/img/film/<?= $films->id; ?>.jpg" class="shadow imgw mx-auto" style="border-radius: 16px;" alt="Affiche du film <?= $films->title; ?>.">
                    <div class="card-body pb-2">
                        <p class="card-text text-center purple"><?= $films->title; ?></p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </section>
</main>

<?php include 'inc/footer.php'; ?>