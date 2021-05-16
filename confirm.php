<?php
$member_id = $_GET['id'];
$token = $_GET['token'];
require 'inc/db.php';
$req = $pdo->prepare('SELECT * FROM member WHERE id = ?');
$req->execute([$member_id]);
$member = $req->fetch();
session_start();

if($member && $member->confirmation_token == $token){
    $pdo->prepare('UPDATE member SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$member_id]);
    $_SESSION['flash']['success'] = "Votre compte à bien été validé.";
    $_SESSION['auth'] = $member;
    header('Location: account.php');
}else{
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide.";
    header('Location: register.php');
}