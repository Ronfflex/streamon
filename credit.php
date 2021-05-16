<?php
require 'inc/functions.php';
logged_only();
require 'inc/header.php';
?>

<!-- RELOAD CREDIT -->
<header class="navbar-margin header">
        <div class="extern-margin container-fluid">
            <h1 class="text-uppercase fw-bold h1">Recharger mon compte</h1>
        </div>
    </header>
    <!-- Amount -->
    <main class="container-fluid extern-margin pt-5 w-75">
        <h2 class="text-center fw-bold fs-1 text-uppercase mb-4">Paiement</h2>
        <div class="row dark-bg" style="padding: 3rem 10% 3rem 10%;">
            <div class="col-6 d-flex flex-column align-items-end pe-5">
                <p class="fw-bold fs-4 mb-3 text-center me-1">Montant: 1€ = 1 Crédit</p>
                <div class="d-flex flex-column me-4 mt-3">
                    <form class="d-flex custom-rounded-nav mb-2">
                        <input type="text" name="credit" id="Credit" class="form-control py-2 shadows border-0 rounded-start"  placeholder="">
                        <p class="dark-text fs-3 fw-bold shadows rounded-end pe-3">€</p>
                    </form>
                    <p class="fw-bold fs-6 mb-3 text-center">Vous détenez actuellement<br><span class="purple">X</span> Crédit(s)</p>
                </div>
            </div>
            <!-- Payment method -->
            <div class="col-6 ps-5">
                <p class="fw-bold fs-4 mb-3">Mode de paiment</p>
                <ul class="list-unstyled">
                    <li class="fs-5 d-flex align-items-center mb-4">
                        <input class="form-check-input me-4" type="radio" name="flexRadioDefault" id="paypal" checked>
                        <label class="form-check-label" for="paypal">Paypal (5 crédits minimum)</label>
                    </li>
                    <li class="fs-5 d-flex align-items-center mb-4">
                        <input class="form-check-input me-4" type="radio" name="flexRadioDefault" id="creditCard">
                        <label class="form-check-label" for="creditCard">Carte bancaire (Visa / Mastercard)</label>
                    </li>
                    <li class="fs-5 d-flex align-items-center mb-4">
                        <input class="form-check-input me-4" type="radio" name="flexRadioDefault" id="mobile">
                        <label class="form-check-label" for="mobile">Mobile</label>
                    </li>
                </ul>
            </div>
            <div class="mt-5 px-3 w-75" style="margin-left: 12%;">
                <button class="btn btn-lg purple-btn text-uppercase fw-bold fs-5 py-3 w-100" type="submit" name="pay">Payer maintenant</button>
                <p class="text-center small mt-2 px-3">* En cliquant sur le bouton "Payer maintenant", vous allez être redirigé vers la page de paiement. Cette interface est indépendante de StreamOn.fr et entièrement sécurisée.</p>
            </div>
        </div>
    </main>

    
<?php require 'inc/footer.php';?>