
  <?php

    
	if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['Adresse électronique'])and isset($_POST['password']) and isset($_POST['telephone']) )
	{
		if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['Adresse électronique'])and !empty($_POST['password']) and !empty($_POST['telephone']))
		{
			try
			{
				global $bdd;
				$bdd = new PDO('mysql:host=localhost;dbname=form;charset=utf8', 'root', '');
				
			}
			catch (Exception $e)
			{
					die('Erreur : ' . $e->getMessage());
			}
		$sql1="select * from client where  adresse email='".$_POST['eml']."'";
		$reponse = $bdd->query($sql1);
	    $donnees = $reponse->fetch();
	
			if(empty($donnees))
			{   
				$sql2="insert into client(nom, prenom, Adresse électronique,password,telephone) values('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['Adresse électronique']."','".$_POST['password'].",'".$_POST['telephone'].")";
				$bdd->exec($sql2);
				echo"<center>Utilisateur ".$_POST['nom']." est ajouté avec succés</center>";
			}
			else
			echo "<center>Utilisateur existe déja !!!</center>";
		} 
	}
	?>
  </body>
</html>
