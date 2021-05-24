<?php
function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}


function str_random($length){
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}


function session(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
}


function logged_only(){
    session();
    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = "Veuillez vous connecter pour accéder à la page.";
        header('Location: ../register.php');
        exit();
    }
}

function admin_only(){
    session();
    if(!isset($_SESSION['auth']) || $_SESSION['auth']->is_admin == 0){
        $_SESSION['flash']['danger'] = "Vous n'avez pas accès à cette page.";
        header('Location: ../index.php');
        exit();
    }
}

// Remember Cookie
function reconnect_from_cookie(){
    session();
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


// Date format
function date_form(){
    $confirmed_at = $_SESSION['auth']->confirmed_at;
    setlocale(LC_TIME, 'fr_FR.utf8','fra');
    echo $confirmed_date = strftime('%d %B %Y', strtotime($confirmed_at));
}