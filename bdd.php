<!DOCTYPE html>
<html>
  <head>
    <title>BDD</title>
  </head>
  <body>
    <?php
			
			//Connexion au serveur.
            mysql_connect("localhost", "", "") or die(mysql_error());
            mysql_select_db("projet") or die(mysql_error());
			
			//Suppression de la BDD pour tester de 0.
			$del = "DROP TABLE IF EXISTS `user`";
			mysql_query($del) Or die(mysql_error());
			
			//Suppression de la BDD pour tester de 0.
			$del = "DROP TABLE IF EXISTS `posts`";
			mysql_query($del) Or die(mysql_error());
			
			//**************************************************** UTILISATEURS ****************************************************
			
			//Creation de la BDD.
			$crea_user= "CREATE TABLE IF NOT EXISTS `user` (`id` int(11) NOT NULL auto_increment,`pseudo` text NOT NULL,`mdp` text NOT NULL,`date_inscri` date NOT NULL, PRIMARY KEY  (`id`))";
			mysql_query($crea_user) Or die(mysql_error());
			
			//Ajout de membres pour simulation.
			$membre1 = "INSERT INTO user(pseudo,mdp,date_inscri) VALUES('arthur','123456','2016-11-25')";
			$membre2 = "INSERT INTO user(pseudo,mdp,date_inscri) VALUES('oceane','123456','2016-11-27')";
			mysql_query($membre1) or die (mysql_error());
			mysql_query($membre2) or die (mysql_error());		
			//----------------------------------------------------------------------------------------------------------------------
			
			
			//****************************************************** ARTICLES ******************************************************
			
			//Creation de la BDD.
			$crea_posts= "CREATE TABLE IF NOT EXISTS `posts` (
			`id_post` INT NOT NULL AUTO_INCREMENT,
			`id_profil` INT NOT NULL ,
			`date` DATE NOT NULL ,
			`titre` TEXT NOT NULL ,
			`link` TEXT NOT NULL ,
			`tag` TEXT NOT NULL ,
			`categorie` TEXT NOT NULL, 
			PRIMARY KEY  (`id_post`))";
			mysql_query($crea_posts) Or die(mysql_error());
			
			//Ajout de membres pour simulation.
			$post1 = "INSERT INTO posts(id_profil,date,titre,link,tag,categorie) VALUES('1','2016-11-29','Reparation Garagiste','www.google.fr','Moto','Automobile')";
			$post2 = "INSERT INTO posts(id_profil,date,titre,link,tag,categorie) VALUES('2','2016-11-30','Mon cours de Medecine','www.facebook.com','Travail','Santé')";
			mysql_query($post1) or die (mysql_error());
			mysql_query($post2) or die (mysql_error());
			//-----------------------------------------------------------------------------------------------------------------------
            
			//Exemple de selection : les pseudos.
			$pseudo = "SELECT pseudo FROM user";
			$req_pseudo = mysql_query($pseudo) or die(mysql_error());
			while ($data = mysql_fetch_array($req_pseudo)) {echo 'pseudo : '.$data['pseudo'].'<br />';}
			
			//Récuperation post pour affichage.
			$post = "SELECT * FROM posts";		
			$req_post = mysql_query($post) or die(mysql_error());
			while ($data = mysql_fetch_array($req_post)) {echo 'Titre : '.$data['titre'].'<br />';}
			
			//Fermeture du serveur.
			mysql_close ();

    ?>
  </body>
</html>
