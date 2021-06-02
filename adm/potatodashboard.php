<?php
require '../inc/functions.php';
admin_only();
require_once '../inc/db.php';

setlocale(LC_TIME, 'fr');

$req = mysqli_query($con,'SELECT * FROM member ORDER BY id DESC LIMIT 10');
//$req = $pdo->prepare('SELECT * FROM member');
//$req->execute(['username']);
//$member = $req->fetchAll();


$film = mysqli_query($con,'SELECT * FROM film ORDER BY add_date DESC LIMIT 10');

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
    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type; ?> fixed-top">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>


    <div class="extern-margin bg-light" style="height: 100vh">
        <h1 class="fs-1 mb-4 text-uppercase fw-bold">Bonjour admin <?= $_SESSION['auth']->username; ?></h1>
        <a href="../index.php" class="btn btn-primary mb-5">Acceuil</a>
        <a href="add_film.php" class="btn btn-primary mb-5">Ajouter un film</a>
        <a href="add_series.php" class="btn btn-primary mb-5">Ajouter une série</a>


        <!-- SHOW MEMBERS -->
        <div class="purple-bg p-2 mb-4">
        <h2 class="fs-3 mb-3 py-2 ps-2 fw-bold text-white">Membres inscrits</h2>
        <table class="table table-light mb-0">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Confirmer le compte (unban)</th>
                    <th scope="col" class="text-center">Réinitialiser le mdp</th>
                    <th scope="col" class="text-center">Bannir le compte (unconfirm)</th>
                    <th scope="col" class="text-center">Supprimer de la bdd</th>
                </tr>
            </thead>
            <tbody>
                <?php while($member = mysqli_fetch_array($req)): ?>
                <tr>
                    <th scope="row"><?php echo $member['id']; ?></th>
                    <td><?php echo $member['username']; ?></td>
                    <td><?php echo $member['mail']; ?></td>
                    <td class="text-center"><?php if(!empty($member['confirmation_token']) || $member['confirmation_token'] == 'BANNED'){ ?>
                    <a href="../confirm.php?id=<?php echo $member['id'] ?>&token=<?php echo $member['confirmation_token'] ?>" class="btn btn-primary btn-sm">Confirmer</a><?php }else{echo strftime('%c',strtotime($member['confirmed_at']));} ?></td>
                    <td class="text-center">
                        <a href="mailpassword.php?mail=<?php echo $member['mail'] ?>" class="btn btn-primary btn-sm me-2">Mail</a>
                        <a href="manualpassword.php?mail=<?php echo $member['mail'] ?>" class="btn btn-primary btn-sm">Manuel</a>
                    </td>
                    <td class="text-center"><?php if($member['confirmation_token'] != 'BANNED'){ ?>
                    <a href="ban.php?id=<?php echo $member['id'] ?>" class="btn btn-primary btn-sm me-2">Bannir</a><?php }else{echo 'BANNI';} ?></td>
                    <td class="text-center">
                        <a href="delete.php?id=<?php echo $member['id'] ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Êtes-vous sur de vouloir supprimer définitivement l\'utilisateur <?php echo $member['username'] ?> ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>


        <!-- SHOW FILMS -->
        <div class="purple-bg p-2">
        <h2 class="fs-3 mb-3 py-2 ps-2 fw-bold text-white">Films</h2>
        <table class="table table-light mb-0">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Titre</th>
                    <th scope="col">URL1</th>
                    <th scope="col">URL2</th>
                    <th scope="col" class="text-center">Ajouté par ... le ...</th>
                    <th scope="col" class="text-center">Edité par ... le ...</th>
                    <th scope="col" class="text-center">Modifier</th>
                    <th scope="col" class="text-center">Supprimer de la bdd</th>
                </tr>
            </thead>
            <tbody>
                <?php while($films = mysqli_fetch_array($film)): ?>
                <tr>
                    <th scope="row"><?php echo $films['id']; ?></th>
                    <td><a href="../anime.php?id_film=<?php echo $films['id']; ?> "><?php echo $films['title']; ?></a></td>
                    <td><a href="<?php echo $films['url']; ?>" target="_blank"><?php echo $films['url']; ?></a></td>
                    <td><a href="<?php echo $films['url2']; ?>" target="_blank"><?php echo $films['url2']; ?></a></td>
                    <td class="text-center"><?php echo $films['add_by'] . '<br>' . strftime('%c',strtotime($films['add_date']));?></td>
                    <td class="text-center"><?php echo $films['edit_by']; ?><br><?php if($films['edit_date'] !== NULL){echo strftime('%c',strtotime($films['edit_date']));}?></td>
                    <td class="text-center">
                        <a href="add_film.php?id_film=<?php echo $films['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    </td>
                    <td class="text-center">
                        <a href="delete.php?id_film=<?php echo $films['id']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Êtes-vous sur de vouloir supprimer définitivement le film <?php echo $films['title']; ?> ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>

    </div>
</body>
</html>