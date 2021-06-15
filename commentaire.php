<meta charset="utf-8" />
<?php
$bdd = new PDO('mysql:host=3306;dbname=espace_commentaires;charset=utf8','root','root'); // pour la dase de données

if(isset($_GET['id']) AND !empty($_GET['id'])) { // on verifie si la variable getid n'est pas vide
   $getid = htmlspecialchars($_GET['id']); //  pour la securite
   $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?'); // requete pour recuper tt dans la table
   $article->execute(array($getid));
   $article = $article->fetch();
   
   
   if(isset($_POST['submit_commentaire'])) { // si la variable existe
      if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) { // si tout les champs existe et complete
         $pseudo = htmlspecialchars($_POST['pseudo']);//securité
         $commentaire = htmlspecialchars($_POST['commentaire']);
         if(strlen($pseudo) < 25) {
            $ins = $bdd->prepare('INSERT INTO commentaires (pseudo, commentaire, id_article) VALUES (?,?,?)'); // insertion bdd
            $ins->execute(array($pseudo,$commentaire,$getid));// execute la requete
            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
         } else {
            $c_msg = "Erreur: Le pseudo doit faire moins de 25 caractères";
         }
      } else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
   $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE id_article = ? ORDER BY id DESC');
   $commentaires->execute(array($getid));
   
   ?>
   <h2>Article:</h2>
   <p><?= $article['contenu'] ?></p> // on affiche le contenu
   <?php
}
?>
