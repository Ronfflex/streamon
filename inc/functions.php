<?php
function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}


function str_random($length){
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}


function logged_only(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = "Veuillez vous connecter pour accéder à la page.";
        header('Location: ../register.php');
        exit();
    }
}

// Remember Cookie
function reconnect_from_cookie(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_COOKIE['remember']) && !isset($_SESSION['auth'])){
        require_once 'db.php';
        if(!isset($pdo)){
            global $pdo;
        }
        $remember_token = $_COOKIE['remember'];
        $parts = explode('==', $remember_token);
        $member_id = $parts[0];
        $req = $pdo->prepare('SELECT * FROM member WHERE id = ?');
        $req->execute([$member_id]);
        $member = $req->fetch();
        if($member){
            $expected = $member_id . '==' . $member->remember_token . sha1($member_id . 'pourlagloire');
            if($expected == $remember_token){
                session_start();
                $_SESSION['auth'] = $member;
                setcookie('remember', $remember_token, strtotime('+7 days'));
            }else{
                setcookie('remember', NULL, -1);
            }
        }else{
            setcookie('remember', NULL, -1);
        }
    }
}