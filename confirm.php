<?php
//faire une vérif type : if(!empty($_GET) && !empty($_GET['id']))  ?
$member_id = $_GET['id'];
$token = $_GET['token'];
require 'inc/db.php';
$req = $pdo->prepare('SELECT * FROM member WHERE id = ?');
$req->execute([$member_id]);
$member = $req->fetch();

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if($member && $member->confirmation_token == $token){
    $pdo->prepare('UPDATE member SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$member_id]);
    if(isset($_SESSION['auth']) && $_SESSION['auth']->is_admin == 1){
        $_SESSION['flash']['success'] = 'Le compte de l\'utilisateur à bien été confirmé.';
        header('Location: adm/potatodashboard.php');
        exit();
    }else{
        $_SESSION['auth'] = $member;
        $_SESSION['flash']['success'] = "Votre compte à bien été validé.";
        header('Location: account.php');
        exit();
    }
}else{
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide.";
    header('Location: register.php');
    exit();
}