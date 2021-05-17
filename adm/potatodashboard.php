<?php
require '../inc/functions.php';
logged_only();
require_once '../inc/db.php';


$req = mysqli_query($con,'SELECT * FROM member');
//$req = $pdo->prepare('SELECT * FROM member');
//$req->execute(['username']);
//$member = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page administrateur</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../src/css/main.css" rel="stylesheet">
    
    <!-- font-family: Verdana -->
</head>

<body>
    <h1>Coucou tu es admin.</h1>

    <!-- Show members -->
    <ul>
        <?php //print_r($member); foreach($member as $members): 
                while($member = mysqli_fetch_array($req)){    
        ?>
            <li><?php //$member['username']
                    echo $member['username'];    
            ?></li>
        <?php //endforeach 
                }
        ?>
    </ul>
</body>
</html>