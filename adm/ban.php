<?php
require '../inc/functions.php';
admin_only();
require_once '../inc/db.php';

if(!empty($_GET) && !empty($_GET['id'])){
    $member_id = $_GET['id'];
    $req = $pdo->prepare('SELECT * FROM member WHERE id = ?');
    $req->execute([$member_id]);
    $member = $req->fetch();

    if($member){
    session();
    $pdo->prepare('UPDATE member SET confirmation_token = "BANNED", confirmed_at = NULL WHERE id = ?')->execute([$member_id]);
    $_SESSION['flash']['success'] = 'Le compte de l\'utilisateur à bien été banni.';
    header('Location: potatodashboard.php');
    exit();
    }
}else{
    $_SESSION['flash']['danger'] = 'Erreur lors de la récupération de l\'id.';
    header('Location: potatodashboard.php');
    exit();
}