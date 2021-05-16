<?php
require 'inc/functions.php';
logged_only();
require 'inc/header.php';
?>


    <!-- ACCOUNT -->
    <header class="navbar-margin header">
        <div class="extern-margin container-fluid">
            <div class="d-flex px-0">
                <img src="src/img/popular-today/violet-evergarden.jpg" class="img-thumbnail me-4" alt="Image de profil">
                <div class="pe-4 d-flex flex-column justify-content-evenly w-100">
                    <h1 class="text-uppercase fw-bold h1 mb-0"><?= $_SESSION['auth']->username; ?></h1>
                    <p class="fs-5 fw-bold mb-2">exemple.mail@gmail.com</p>
                    <span class="border-bottom border-2"></span>
                </div>
            </div>
        </div>
    </header>

    <main class="container-fluid extern-margin w-50">
        <h2 class="mb-4 text-uppercase fs-1 fw-bold text-center">Informations personnelles</h2>
        <div class="row py-3 px-2 dark-bg">
            <div class="col-12 mb-3 ps-2 pe-1">
                <label for="inputLastname" class="text-uppercase fw-bold fs-5 mb-1">Nom</label>
                <input type="text" name="lastname" class="form-control py-2" id="inputLastname" placeholder="" disabled>
            </div>
            <div class="col-12 mb-3 ps-2 pe-1">
                <label for="inputFirstname" class="text-uppercase fw-bold fs-5 mb-1">Prénom</label>
                <input type="text" name="firstname" class="form-control py-2" id="inputFirstname" placeholder="" disabled>
            </div>
            <div class="col-12 mb-3 ps-2 pe-1">
                <label for="inputAddress" class="text-uppercase fw-bold fs-5 mb-1">Adresse</label>
                <input type="text" name="address" class="form-control py-2" id="inputAddress" placeholder="" disabled>
            </div>
            <div class="col-12 mb-3 ps-2 pe-1">
                <label for="inputCity" class="text-uppercase fw-bold fs-5 mb-1">Ville</label>
                <input type="text" name="city" class="form-control py-2" id="inputCity" placeholder="" disabled>
            </div>
            <div class="col-6 mb-3 ps-2 pe-1">
                <label for="inputZip" class="text-uppercase fw-bold fs-5 mb-1">Code postal</label>
                <input type="text" name="zip" class="form-control py-2" id="inputZip" placeholder="" disabled>
            </div>
            <div class="col-6 mb-3 ps-2 pe-1">
                <label for="inputState" class="text-uppercase fw-bold fs-5 mb-1">État / Province</label>
                <input type="text" name="state" class="form-control py-2" id="inputState" placeholder="" disabled>
            </div>
            <div class="col-12 mb-3 ps-2 pe-1">
                <label for="inputCountry" class="text-uppercase fw-bold fs-5 mb-1">Pays</label>
                <input type="text" name="country" class="form-control py-2" id="inputCountry" placeholder="" disabled>
            </div>
            <div class="col-12 mb-3 ps-2 pe-1">
                <label for="inputPhone" class="text-uppercase fw-bold fs-5 mb-1">Numéro de téléphone</label>
                <input type="text" name="phone" class="form-control py-2" id="inputPhone" placeholder="" disabled>
            </div>
            <div class="mt-2 px-1">
                <button class="btn btn-lg purple-btn text-uppercase fw-bold p-0 fs-5 w-100">
                    <a href="#" class="white-text d-flex py-3" style="padding: 0 44.24%;">Modifier</a>
                </button>
            </div>
        </div>
    </main>



<?php require 'inc/footer.php';?>