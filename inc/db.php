<?php
// Ne pas oublier de changer l'identifiant et le mdp par ceux de la db du serveur
$pdo = new PDO('mysql:dbname=streamon;host=localhost', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$host='localhost';
$username='root';
$pass='root';
$dbname='streamon';
$con=mysqli_connect($host,$username,$pass,$dbname);
if(!$con){
    die('Could not Connect MySql Server:' .mysql_error());
}