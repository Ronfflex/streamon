<?php
require 'inc/functions.php';
logged_only();
require 'inc/header.php';
?>

    <!-- PROFILE -->
    <header class="navbar-margin header">
        <div class="extern-margin container-fluid row">
            <div class="col-10 d-flex px-0">
                <img src="src/img/popular-today/violet-evergarden.jpg" class="img-thumbnail me-4 dark-bg border-0" alt="Image de profil">
                <div class="pe-4 d-flex flex-column justify-content-evenly border-bottom border-2 w-100">
                    <h1 class="text-uppercase fw-bold h1 mb-0"><?= $_SESSION['auth']->username; ?></h1>
                    <div>
                        <?php if($_SESSION['auth']->status == 0): ?><p class="fs-6 mb-2 free-text">Offre gratuite</p><?php endif; ?>
                        <?php if($_SESSION['auth']->status == 1): ?><p class="fs-6 mb-2 gold-text">Offre prenium</p><?php endif; ?>
                        <p class="fs-5 fw-bold mb-2">Membre depuis le <?= date_form() ?></p>
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 fw-bold">Suit actuellement <span class="purple">XX</span> Animes</p>
                            <p class="fs-5 fw-bold"><span class="purple">XX</span> Jetons</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 text-center d-flex flex-column justify-content-evenly px-0 border-bottom border-start border-2">
                <p><a href="account.php" class="purple fw-bold fs-5">Éditer mes informations</a></p>
                <span class="mx-3 border-bottom border-2"></span>
                <p><a href="#" class="purple fw-bold fs-5">Historique de commandes</a></p>
            </div>
        </div>
    </header>



    <main class="container-fluid extern-margin">
        <!-- Followed series -->
        <section>
            <div class="pt-5 d-flex justify-content-between purple-bg">
                <h2 class="w-25 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Série suivie</h2>
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
        <!-- Last activities -->
        <section>
            <div class="pt-5 purple-bg">
                <h2 class="w-25 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Dernière activités</h2>
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
        <!-- Resume viewing -->
        <section>
            <div class="pt-5 purple-bg">
                <h2 class="w-25 ms-5 mb-0 custom-rounded px-3 py-2 fs-4 fw-bold dark-bg text">Reprendre le visionage</h2>
            </div>
            <div class="row mx-0 px-5 pt-4 pb-5 mb-5 dark-bg">
                <!-- card -->
                <div class="col-3 d-flex justify-content-center mt-5 mb-5">
                    <div class="card" style="width: 30rem;">
                        <div class="miniature overflow-hidden">
                            <img src="src/img/popular-today/re-zero.jpg" class="card-img-top" alt="Miniature de la vidéo">
                            <div class="card-img-overlay h-25">
                                <p class="purple-bg white-text p-2 fs-5 rounded-circle fit">01</p>
                                <a href="#" class="purple-bg p-2 mt-3 me-3 rounded-circle position-absolute end-0 top-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x-lg white-text p-1 pt-1" viewBox="0 0 16 16">
                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <a href="#">
                            <div class="purple-bg d-flex align-items-center justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-badge-hd white-text" viewBox="0 0 16 16">
                                    <path d="M7.396 11V5.001H6.209v2.44H3.687V5H2.5v6h1.187V8.43h2.522V11h1.187zM8.5 5.001V11h2.188c1.811 0 2.685-1.107 2.685-3.015 0-1.894-.86-2.984-2.684-2.984H8.5zm1.187.967h.843c1.112 0 1.622.686 1.622 2.04 0 1.353-.505 2.02-1.622 2.02h-.843v-4.06z"/>
                                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                </svg>
                                <p class="mx-2 my-1 white-text">23:30</p>
                            </div>
                            <div class="card-body dark-bg">
                                <h5 class="card-title text fs-5">Titre de fifou</h5>
                                <p class="card-text text-uppercase fs-6">Saison 1</p>
                                <p class="text-uppercase fs-6 text-end mt-3">VOSTFR</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- card -->
                <div class="col-3 d-flex justify-content-center mt-5 mb-5">
                    <div class="card" style="width: 30rem;">
                        <div class="miniature overflow-hidden">
                            <img src="src/img/popular-today/re-zero.jpg" class="card-img-top" alt="Miniature de la vidéo">
                            <div class="card-img-overlay h-25">
                                <p class="purple-bg white-text p-2 fs-5 rounded-circle fit">01</p>
                                <a href="#" class="purple-bg p-2 mt-3 me-3 rounded-circle position-absolute end-0 top-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x-lg white-text p-1 pt-1" viewBox="0 0 16 16">
                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <a href="#">
                            <div class="purple-bg d-flex align-items-center justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-badge-hd white-text" viewBox="0 0 16 16">
                                    <path d="M7.396 11V5.001H6.209v2.44H3.687V5H2.5v6h1.187V8.43h2.522V11h1.187zM8.5 5.001V11h2.188c1.811 0 2.685-1.107 2.685-3.015 0-1.894-.86-2.984-2.684-2.984H8.5zm1.187.967h.843c1.112 0 1.622.686 1.622 2.04 0 1.353-.505 2.02-1.622 2.02h-.843v-4.06z"/>
                                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                </svg>
                                <p class="mx-2 my-1 white-text">23:30</p>
                            </div>
                            <div class="card-body dark-bg">
                                <h5 class="card-title text fs-5">Titre de fifou</h5>
                                <p class="card-text text-uppercase fs-6">Saison 1</p>
                                <p class="text-uppercase fs-6 text-end mt-3">VOSTFR</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- card -->
                <div class="col-3 d-flex justify-content-center mt-5 mb-5">
                    <div class="card" style="width: 30rem;">
                        <div class="miniature overflow-hidden">
                            <img src="src/img/popular-today/re-zero.jpg" class="card-img-top" alt="Miniature de la vidéo">
                            <div class="card-img-overlay h-25">
                                <p class="purple-bg white-text p-2 fs-5 rounded-circle fit">01</p>
                                <a href="#" class="purple-bg p-2 mt-3 me-3 rounded-circle position-absolute end-0 top-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x-lg white-text p-1 pt-1" viewBox="0 0 16 16">
                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <a href="#">
                            <div class="purple-bg d-flex align-items-center justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-badge-hd white-text" viewBox="0 0 16 16">
                                    <path d="M7.396 11V5.001H6.209v2.44H3.687V5H2.5v6h1.187V8.43h2.522V11h1.187zM8.5 5.001V11h2.188c1.811 0 2.685-1.107 2.685-3.015 0-1.894-.86-2.984-2.684-2.984H8.5zm1.187.967h.843c1.112 0 1.622.686 1.622 2.04 0 1.353-.505 2.02-1.622 2.02h-.843v-4.06z"/>
                                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                </svg>
                                <p class="mx-2 my-1 white-text">23:30</p>
                            </div>
                            <div class="card-body dark-bg">
                                <h5 class="card-title text fs-5">Titre de fifou</h5>
                                <p class="card-text text-uppercase fs-6">Saison 1</p>
                                <p class="text-uppercase fs-6 text-end mt-3">VOSTFR</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>



<?php require 'inc/footer.php'; ?>