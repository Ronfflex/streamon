<?php
require '../inc/functions.php';
admin_only();

session();
if(!empty($_GET) && !empty($_GET['id'])){
    require_once '../inc/db.php';
    $member_id = $_GET['id'];
    $req = $pdo->prepare('SELECT * FROM member WHERE id = ?');
    $req->execute([$member_id]);
    if($req->rowCount() > 0){
        $ban = $pdo->prepare('DELETE FROM member WHERE id = ?');
        $ban->execute([$member_id]);
        header('Location: potatodashboard.php');
    }else{
        $_SESSION['flash']['danger'] = 'Aucun membre n\'a été trouvé.';
    }
}else{
    $_SESSION['flash']['danger'] = 'Erreur lors de la récupération de l\'id.';
}

?>