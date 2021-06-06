<?php
require '../inc/functions.php';
admin_only();


if(!empty($_GET)){
    require_once '../inc/db.php';

    // DELETE MEMBER
    if(!empty($_GET['id']) && empty($_GET['id_film'])){
        $member_id = $_GET['id'];
        $req = $pdo->prepare('SELECT * FROM member WHERE id = ?');
        $req->execute([$member_id]);
        if($req->rowCount() > 0){
            $del = $pdo->prepare('DELETE FROM member WHERE id = ?');
            $del->execute([$member_id]);
            $_SESSION['flash']['success'] = 'Le compte de l\'utilisateur à bien été supprimé.';
            header('Location: potatodashboard.php');
            exit();
        }else{
            $_SESSION['flash']['danger'] = 'Aucun membre n\'a été trouvé.';
            header('Location: potatodashboard.php');
            exit();
        }
    }

    // DELETE FILM
    if(!empty($_GET['id_film']) && empty($_GET['id'])){
        $film_id = $_GET['id_film'];
        $req = $pdo->prepare('SELECT * FROM film WHERE id = ?');
        $req->execute([$film_id]);
        if($req->rowCount() > 0){
            $del = $pdo->prepare('DELETE FROM film WHERE id = ?');
            $del->execute([$film_id]);

            // image delete
            $path = '../src/img/film/' . "$film_id" . '.jpg';
            unlink($path);

            $_SESSION['flash']['success'] = 'Le film à bien été supprimé.';
            header('Location: potatodashboard.php');
            exit();
        }else{
            $_SESSION['flash']['danger'] = 'Aucun film n\'a été trouvé.';
            header('Location: potatodashboard.php');
            exit();
        }
    }else{
        $_SESSION['flash']['danger'] = 'Erreur lors de la récupération de l\'id.';
        header('Location: potatodashboard.php');
        exit();
    }
}else{
    $_SESSION['flash']['danger'] = 'Erreur lors de la récupération de l\'id.';
    header('Location: potatodashboard.php');
    exit();
}