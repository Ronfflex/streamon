<?php
require 'inc/functions.php';
logged_only();
require_once 'inc/db.php';


// Add to favorite
if(!empty($_GET) && !empty($_GET['id_film'])){
    $id_film = htmlspecialchars($_GET['id_film']);
    $req = $pdo->prepare('SELECT * FROM film WHERE id = ?');
    $req->execute([$id_film]);
    // Check if film to add exist
    if($req->rowCount() == 1){
        $id_user = $_SESSION['auth']->id;
        $fav = $pdo->prepare('INSERT INTO member_fav (member_id, film_id) VALUES ('."$id_user, $id_film".')');
        $fav->execute();

        $_SESSION['flash']['success'] = 'Film ajouté aux favoris.';
        header("Location: watchlist.php");
        exit;
    }else{
    $_SESSION['flash']['danger'] = 'Erreur lors de l\'ajout aux favoris.';
    header("Location: javascript://history.go(-1)");
    exit;
    }
}else{
    $_SESSION['flash']['danger'] = 'Erreur lors de l\'ajout aux favoris.';
    header("Location: javascript://history.go(-1)");
    exit;
}