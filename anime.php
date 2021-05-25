<?php require 'inc/header.php'; ?>









    <header class="navbar-margin header">
        <div class="extern-margin container-fluid">
            <h1 class="text-uppercase fw-bold h1">Nom du film/série</h1>
        </div>
    </header>

    <main class="container-fluid extern-margin">
        <div class="row">
            <!-- LEFT PART -->
            <div class="col-8">
                <!-- videoplayers links -->
                <div class="text-end mb-1 me-3">
                    <a href="#" class="btn btn-primary btn-sm me-2">Uptobox</a>
                    <a href="#" class="btn btn-primary btn-sm">Verystream</a>
                </div>
                <!-- videoplayer -->
                <div class="text-center">
                    <iframe width="960" height="540" src="https://uptostream.com/iframe/cu7r8715nqcq" scrolling="no" frameborder="0" allowfullscreen webkitallowfullscreen></iframe>
                </div>
                <div class="purple-border-t row mx-3">
                    <!-- synopsis -->
                    <div class="col-6 px-0 mt-2">
                        <h5 class="fs-5 mb-1">Synopsis:</h5>
                        <p class="fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo doloribus dicta eligendi ab, sunt iusto, nam unde corporis quibusdam quas aut. Esse, laborum. Dolores, fugiat debitis autem accusamus iste ducimus.</p>
                    </div>
                    <!-- directors and voice actors -->
                    <div class="col-6 mt-2">
                        <h5 class="fs-5 mb-1">Réalisateur(s) et Doubleurs:</h5>
                        <div class="d-flex justify-content-around">
                            <div class="text-center">
                                <img class="border-2 purple-border rounded-circle" width="80px" height="80px" alt="photo de profil" src="../src/img/popular-today/violet-evergarden.jpg">
                                <p class="fs-6 mt-1">Un Acteur</p>
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
                            <h5 class="mb-2 fs-5">Princesse Mononoké</h5>
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
                            <h5 class="mb-2 fs-5">Princesse Mononoké</h5>
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