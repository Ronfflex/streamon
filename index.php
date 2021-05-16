<?php require 'inc/header.php'; ?>


    <!-- CAROUSEL -->
    <header id="carouselExampleCaptions" class="carousel slide navbar-margin" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="8000">
                <img src="src/img/carousel/DrStone_3840x945.jpg" class="d-block w-100" alt="Banderole de l'anime Dr.Stone.">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">Dr. Stone</h5>
                    <p class="text-white">Dr. Stone, le plus grand esprit scientifique revient pour une saison 2 !</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="8000">
                <img src="src/img/carousel/DrStone_3840x945.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">Dr. Stone</h5>
                    <p class="text-white">Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="src/img/carousel/DrStone_3840x945.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">Third slide label</h5>
                    <p class="text-white">Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédente slide</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Prochaine slide</span>
        </button>
    </header>
    
    
    <!-- SECTIONS -->
    <div class="container-fluid extern-margin">
        <!-- Popular today -->
        <section>
            <div class="pt-5 d-flex justify-content-between purple-bg">
                <h2 class="w-25 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Populaire Aujourd'hui</h2>
                <button class="btn white-btn fw-bold mb-2 me-5" type="button">Tout voir</button>
            </div>
            <div class="row mx-0 px-5 pt-4 pb-5 mb-5 dark-bg">
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Le voyage de Chihiro</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/a-silent-voice.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche du film A Silent Voice">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">A Silent Voice</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/mon-voisin-totoro.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche du film Mon voisin Totoro">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Mon voisin Totoro</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/re-zero.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche de la série animée Re:Zero">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Re:Zero</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/the-promise-neverland.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche de la série animée The Promised Neverland">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">The Promised Neverland</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/violet-evergarden.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche du film Violet Evergarden">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Violet Evergarden</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        
        
        <div class="row">
            <div class="col-8">
                <!-- In progress -->
                <section class="col-12">
                    <div class="pt-5 d-flex justify-content-between purple-bg">
                        <h2 class="w-25 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">En Cours</h2>
                        <button class="btn white-btn fw-bold mb-2 me-5" type="button">Tout voir</button>
                    </div>
                    <div class="row mx-0 px-5 pt-4 pb-5 mb-5 dark-bg">
                        <div class="col">
                            <a href="#" class="card m-3 border-0 align-items-center dark-bg">
                                <img src="src/img/popular-today/re-zero.jpg" class="shadow" style="border-radius: 16px" alt="Affiche de la série animée Re:Zero">
                                <div class="card-body pb-2">
                                    <p class="card-text text-center purple">Re:Zero</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card m-3 border-0 align-items-center dark-bg">
                                <img src="src/img/popular-today/the-promise-neverland.jpg" class="shadow" style="border-radius: 16px" alt="Affiche de la série animée The Promised Neverland">
                                <div class="card-body pb-2">
                                    <p class="card-text text-center purple">The Promised Neverland</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card m-3 border-0 align-items-center dark-bg">
                                <img src="src/img/popular-today/your-name.jpg" class="shadow" style="border-radius: 16px" alt="Affiche du film Your Name">
                                <div class="card-body pb-2">
                                    <p class="card-text text-center purple">Your Name</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
                
                
                <?php if(isset($_SESSION['auth'])): ?>
                <!-- Continue to watch -->
                <section class="col-12">
                    <div class="pt-5 d-flex justify-content-between purple-bg">
                        <h2 class="w-50 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Continuer à regarder</h2>
                        <button class="btn white-btn fw-bold mb-2 me-5" type="button">Tout voir</button>
                    </div>
                    <div class="row mx-0 px-5 pt-4 pb-5 mb-5 dark-bg">
                        <div class="col">
                            <a href="#" class="card m-3 border-0 align-items-center dark-bg">
                                <img src="src/img/popular-today/the-promise-neverland.jpg" class="shadow" style="border-radius: 16px" alt="Affiche de la série animée The Promised Neverland">
                                <div class="card-body pb-2">
                                    <p class="card-text text-center purple">The Promised Neverland</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card m-3 border-0 align-items-center dark-bg">
                                <img src="src/img/popular-today/violet-evergarden.jpg" class="shadow" style="border-radius: 16px" alt="Affiche du film Violet Evergarden">
                                <div class="card-body pb-2">
                                    <p class="card-text text-center purple">Violet Evergarden</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card m-3 border-0 align-items-center dark-bg">
                                <img src="src/img/popular-today/your-name.jpg" class="shadow" style="border-radius: 16px" alt="Affiche du film Your Name">
                                <div class="card-body pb-2">
                                    <p class="card-text text-center purple">Your Name</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php else: ?>
                    <!-- My Watchlist not connected -->
                    <div class="pt-5 d-flex justify-content-between purple-bg">
                        <h2 class="w-25 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Ma Watchlist</h2>
                        <button class="btn white-btn fw-bold mb-2 me-5" type="button">Tout voir</button>
                    </div>
                    <div class="row mx-0 px-5 pt-4 pb-5 dark-bg">
                        <div class="col-4" style="visibility: hidden;">
                            <a href="#" class="card m-3 border-0">
                                <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                                <div class="card-body pb-2">
                                    <p class="card-text text-center purple">Le voyage de Chihiro</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </section>
            </div>
            
            
            <!-- Popular Animes -->
            <section class="col-4">
                <div class="pt-5 purple-bg">
                    <h2 class="w-75 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Animes Populaires</h2>
                </div>
                <div class="mx-0 px-4 pt-3 pb-2 mb-5 dark-bg">
                    <div class="row mb-4 mx-2 p-2 rounded-3 light-bg">
                        <div class="col-4 d-flex px-0 align-items-center justify-content-center">
                            <button type="button" class="btn grey-btn purple-btn-hover fw-bold w-100 mx-2">Semaine</button>
                        </div>
                        <div class="col-4 d-flex px-0 align-items-center justify-content-center">
                            <button type="button" class="btn grey-btn purple-btn-hover fw-bold w-100 mx-2">Mois</button>
                        </div>
                        <div class="col-4 d-flex px-0 align-items-center justify-content-center">
                            <button type="button" class="btn grey-btn purple-btn-hover fw-bold w-100 mx-2">Vie</button>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <p class="text-center border border-3 rounded-3 p-2 mb-0 fw-bold color-border">1</p>
                        </div>
                        <div class="col-3">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7">
                            <h5>Your Name</h5>
                            <p class="card-subtitle">Genres: Drama, Fantaisie</p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <p class="text-center border border-3 rounded-3 p-2 mb-0 fw-bold color-border">2</p>
                        </div>
                        <div class="col-3">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7">
                            <h5>Your Name</h5>
                            <p class="card-subtitle">Genres: Drama, Fantaisie</p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <p class="text-center border border-3 rounded-3 p-2 mb-0 fw-bold color-border">3</p>
                        </div>
                        <div class="col-3">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7">
                            <h5>Your Name</h5>
                            <p class="card-subtitle">Genres: Drama, Fantaisie</p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <p class="text-center border border-3 rounded-3 p-2 mb-0 fw-bold color-border">4</p>
                        </div>
                        <div class="col-3">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7">
                            <h5>Your Name</h5>
                            <p class="card-subtitle">Genres: Drama, Fantaisie</p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <p class="text-center border border-3 rounded-3 p-2 mb-0 fw-bold color-border">5</p>
                        </div>
                        <div class="col-3">
                            <img src="src/img/popular-today/your-name.jpg" class="img-fluid shadow" alt="Affiche du film Your Name">
                        </div>
                        <div class="col-7">
                            <h5>Your Name</h5>
                            <p class="card-subtitle">Genres: Drama, Fantaisie</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        
        <?php if(isset($_SESSION['auth'])): ?>
        <!-- My Watchlist -->
        <section>
            <div class="pt-5 d-flex justify-content-between purple-bg">
                <h2 class="w-25 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Ma Watchlist</h2>
                <button class="btn white-btn fw-bold mb-2 me-5" type="button">Tout voir</button>
            </div>
            <div class="row mx-0 px-5 pt-4 pb-5 dark-bg">
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/le-voyage-de-chihiro.jpg" class="shadow imgw" style="border-radius: 16px;" alt="Affiche du film Le voyage de Chihiro">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Le voyage de Chihiro</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/a-silent-voice.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche du film A Silent Voice">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">A Silent Voice</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/re-zero.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche de la série animée Re:Zero">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Re:Zero</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/the-promise-neverland.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche de la série animée The Promised Neverland">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">The Promised Neverland</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/violet-evergarden.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche du film Violet Evergarden">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Violet Evergarden</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card m-3 border-0 dark-bg">
                        <img src="src/img/popular-today/your-name.jpg" class="shadow imgw" style="border-radius: 16px" alt="Affiche du film Your Name">
                        <div class="card-body pb-2">
                            <p class="card-text text-center purple">Your Name</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <?php else: ?>
        <?php endif; ?>
    </div>


<?php require 'inc/footer.php'; ?>