<?php
require 'inc/functions.php';
logged_only();
require 'inc/header.php';
?>


    <!-- NEWSLETTER -->
    <header class="navbar-margin header">
        <div class="extern-margin container-fluid">
            <h1 class="text-uppercase fw-bold h1">Ma newsletter</h1>
        </div>
    </header>

    <main class="container-fluid extern-margin pt-5 w-50">
        <h2 class="text-center fw-bold fs-1 text-uppercase">Gérer ma newsletter</h2>
        <ul class="list-unstyled mt-5 ms-5">
            <li class="fw-bold fs-5 d-flex align-items-center mb-4">
                <input class="form-check-input me-4" type="checkbox" value="" id="news" checked>
                <label class="form-check-label" for="news">Restez au courant avec les dernières actualités de StreamOn</label>
            </li>
            <li class="fw-bold fs-5 d-flex align-items-center mb-4">
                <input class="form-check-input me-4" type="checkbox" value="" id="recommendations" checked>
                <label class="form-check-label" for="recommendations">Recevez les recommendations de StreamOn</label>
            </li>
            <li class="fw-bold fs-5 d-flex align-items-center mb-4">
                <input class="form-check-input me-4" type="checkbox" value="" id="offers" checked>
                <label class="form-check-label" for="offers">Tenez-vous au courant avec les offres spéciales de StreamOn</label>
            </li>
            <li class="fw-bold fs-5 d-flex align-items-center mb-4">
                <input class="form-check-input me-4" type="checkbox" value="" id="surveys" checked>
                <label class="form-check-label" for="surveys">Participez au sondages de satisfaction de clientèle</label>
            </li>
        </ul>
        <div class="mt-5 px-3">
            <button class="btn btn-lg purple-btn text-uppercase fw-bold fs-5 py-3 w-100" type="submit" name="register">Enregistrer</button>
        </div>
    </main>


<?php require 'inc/footer.php';?>