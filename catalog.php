<?php require 'inc/header.php'; ?>

<header class="navbar-margin header">
    <div class="extern-margin container-fluid">
        <h1 class="text-uppercase fw-bold h1">Catalogue</h1>
    </div>
</header>
<main class="container-fluid extern-margin pt-5">
    <h3 class="text-uppercase fw-bold fs-4 mb-3 dark-text">Recherche d'animes</h3>
    <section class="d-flex mb-4">
        <form class="d-flex custom-rounded-nav col-2 me-4">
            <input class="form-control border-0 search-color" type="search" placeholder="Recherher" aria-label="Recherher">
            <button class="btn search-btn-color" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
        <div class="dropdown">
            <button class="btn btn-lg dark-bg text dropdown-toggle text-uppercase me-2 fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">type</button>
            <ul class="dropdown-menu dark-bg" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item dark-bg text" href="#">Séries <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">Films <span class="purple">(223)</span></a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-lg dark-bg text dropdown-toggle text-uppercase me-2 fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">genre</button>
            <ul class="dropdown-menu dark-bg" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item dark-bg text" href="#">Game <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">Harem <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">Historique <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">Horreur <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">Isekai <span class="purple">(223)</span></a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-lg dark-bg text dropdown-toggle text-uppercase me-4 fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">type</button>
            <ul class="dropdown-menu dark-bg" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item dark-bg text" href="#">2021 <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">2020 <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">2019 <span class="purple">(223)</span></a></li>
              <li><a class="dropdown-item dark-bg text" href="#">2018 <span class="purple">(223)</span></a></li>
            </ul>
        </div>
        <button type="button" class="btn btn-lg dark-bg text d-flex align-items-center fs-6">Ordre alphabétique A-Z
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square ms-2 text" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
            </svg>
        </button>
    </section>
    <section class="row">
        <div class="col">
            <a href="#" class="card m-3 border-0 light-bg">
                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                <div class="card-body pb-2">
                    <p class="card-text text-center" style="color: var(--primary-color);">Le voyage de Chihiro</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#" class="card m-3 border-0 light-bg">
                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                <div class="card-body pb-2">
                    <p class="card-text text-center" style="color: var(--primary-color);">Le voyage de Chihiro</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#" class="card m-3 border-0 light-bg">
                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                <div class="card-body pb-2">
                    <p class="card-text text-center" style="color: var(--primary-color);">Le voyage de Chihiro</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#" class="card m-3 border-0 light-bg">
                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                <div class="card-body pb-2">
                    <p class="card-text text-center" style="color: var(--primary-color);">Le voyage de Chihiro</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#" class="card m-3 border-0 light-bg">
                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                <div class="card-body pb-2">
                    <p class="card-text text-center" style="color: var(--primary-color);">Le voyage de Chihiro</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#" class="card m-3 border-0 light-bg">
                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                <div class="card-body pb-2">
                    <p class="card-text text-center" style="color: var(--primary-color);">Le voyage de Chihiro</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#" class="card m-3 border-0 light-bg">
                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                <div class="card-body pb-2">
                    <p class="card-text text-center" style="color: var(--primary-color);">Le voyage de Chihiro</p>
                </div>
            </a>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>