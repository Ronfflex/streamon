<?php
require 'inc/functions.php';
logged_only();
require 'inc/header.php';
?>

<header class="navbar-margin pb-5 whatchlist-header">
        <div class="extern-margin container-fluid">
            <h1 class="text-uppercase fw-bold mb-5 whatchlist-title">Ma Watchlist</h1>
            <div class="row">
                <div class="d-flex col-10 align-items-center">
                    <div class="shadows px-2 py-1 rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart text" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
                    </div>
                    <p class="ps-3 fs-5">Nombre de Séries Suivies</p>
                </div>
                <form class="d-flex custom-rounded-nav col-2">
                    <input class="form-control border-0 search-color" type="search" placeholder="Recherher" aria-label="Recherher">
                    <button class="btn search-btn-color" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </header>


<section class="container-fluid extern-margin">
    <div class="row">
        <!-- Card -->
        <div class="col-3 d-flex justify-content-center mt-5 mb-5">
            <div class="card" style="width: 30rem;">
                <div class="miniature overflow-hidden">
                    <img src="src/img/popular-today/re-zero.jpg" class="card-img-top" alt="Miniature de la vidéo">
                    <div class="card-img-overlay h-25">
                        <p class="purple-bg white-text p-2 fs-5 rounded-circle fit">01</p>
                        <a href="#" class="purple-bg p-2 rounded-circle position-absolute end-0 top-0 translate">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-heart white-text p-1 pt-2" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
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

    

<?php require 'inc/footer.php'; ?>