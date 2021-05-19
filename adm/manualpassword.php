<?php
require '../inc/functions.php';
admin_only();

if(!empty($_GET) && !empty($_GET['mail'])){
    require_once '../inc/db.php';
    $member_email = $_GET['mail'];
    $req = $pdo->prepare('SELECT * FROM member WHERE mail = ? AND confirmed_at IS NOT NULL');
    $req->execute([$member_email]);
    $member = $req->fetch();
    if($member){
        $reset_token = str_random(60);
        $pdo->prepare('UPDATE member SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $member->id]);
        header("Location: http://localhost/resetpassword.php?id={$member->id}&token=$reset_token");
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Le compte doit d\'abord être confirmé.';
        header("Location: potatodashboard.php");
        exit();
    }
}else{
    $_SESSION['flash']['danger'] = 'Erreur lors de la récupération du mail.';
    header("Location: potatodashboard.php");
    exit();
}
?>