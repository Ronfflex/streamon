<?php
require 'inc/functions.php';
logged_only();
require_once 'inc/db.php';


// Delete of favorites
if(!empty($_GET) && !empty($_GET['id_film'])){
    $id_film = htmlspecialchars($_GET['id_film']);
    $req = $pdo->prepare('SELECT * FROM film WHERE id = ?');
    $req->execute([$id_film]);
    // Check if film to delete exist
    if($req->rowCount() == 1){
        $id_user = $_SESSION['auth']->id;
        $fav = $pdo->prepare('DELETE FROM member_fav WHERE film_id = ? AND member_id = ?');
        $fav->execute([$id_film, $id_user]);

        $_SESSION['flash']['success'] = 'Film supprimé des favoris.';
        header("Location: watchlist.php");
        exit;
    }else{
    $_SESSION['flash']['danger'] = 'Erreur lors de la suppression des favoris.';
    header("Location: javascript://history.go(-1)");
    exit;
    }
}else{
    $_SESSION['flash']['danger'] = 'Erreur lors de la suppression des favoris.';
    header("Location: javascript://history.go(-1)");
    exit;
}