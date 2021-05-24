<?php
// Ne pas oublier de changer l'identifiant et le mdp par ceux de la db du serveur
$pdo = new PDO('mysql:dbname=streamon;host=localhost', 'lvmh768', 'k$T3oX9L3ELc8xMp');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$host='localhost';
$username='lvmh768';
$pass='k$T3oX9L3ELc8xMp';
$dbname='streamon';
$con=mysqli_connect($host,$username,$pass,$dbname);
if(!$con){
    die('Could not Connect MySql Server:' .mysql_error());
}
