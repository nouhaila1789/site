<!DOCTYPE html>
<html>
  <head>
    <title>Inscription</title>
    <style>
        body{
            background-color: rgb(223, 186, 204);
        }
      .w3docs {
        margin-left: 70px;
        font-weight: bold;
        text-align: left;
        font-family: sans-serif, bold, Arial, Helvetica;
        font-size: 14px;  
      }
      .buttons {
        display: flex;
        align-items: center;
        width: 100%;
        border-radius: 5px;
      }
      div input {
        margin-right: 10px;
      }
      form {
        margin: 0 auto;
        width: 600px;
        text-align: center;
      }
      form input {
        padding: 10px;
        border-radius: 5px;
      }
      form select {
        background-color: #ffffff;
        padding: 5px;
      }
      form textarea {
        padding: 10px;
        margin-bottom: 5px;
      }
      form label {
        display: block;
        width: 100%;
        margin-bottom: 5px;
      }
    </style>
  </head>
 
  <body> 
    <h2 style="text-align: center;">INSCRIPTION</h2>
    <form name="RegForm" action="siteweeb.html" onsubmit="return formulaire()" method="post" class="w3docs">
      <div>
        <label for="Nom">Nom:</label>
        <input type="text" id="Nom" size="60" name="Nom" />
      </div>
      <br />
      <div>
        <label for="Prenom">Prenom:</label>
        <input type="text" id="Prenom" size="60" name="prenom" />
      </div>
      <br />
      <div>
        <label for="E-mail" l>Adresse électronique:</label>
        <input type="text" id="E-mail" size="60" name="Email" />
      </div>
      <br />
      <div>
        <label for="Mot de passe">password:</label>
        <input type="text" id="Mot de passe" size="60" name="Mot de passe" />
      </div>
      <br />
      <div>
        <label for="Téléphone">Téléphone: </label>
        <input type="text" id="Téléphone" size="60" name="Téléphone" />
      </div>
      <br />
      
      <div class="buttons">
        <input type="submit" value="Envoyer" name="Envoyer" />
        <input type="reset" value="Réinitialiser" name="Réinitialiser" />
      </div>
    </form> 
    <script>
      function formulaire() {
        var name = document.forms["RegForm"]["Nom"];
        var email = document.forms["RegForm"]["Email"];
        var phone = document.forms["RegForm"]["Téléphone"];
        var password = document.forms["RegForm"]["Mot de passe"];
     
        if (name.value == "") {
          alert("Mettez votre nom.");
          name.focus();
          return false;
        }
        if (address.value == "") {
          alert("Mettez votre adresse.");
          address.focus();
          return false;
        }
        if (email.value == "") {
          alert("Mettez une adresse email valide.");
          email.focus();
          return false;
        }
        if (email.value.indexOf("@", 0) < 0) {
          alert("Mettez une adresse email valide.");
          email.focus();
          return false;
        }
        if (email.value.indexOf(".", 0) < 0) {
          alert("Mettez une adresse email valide.");
          email.focus();
          return false;
        }
        if (phone.value == "") {
          alert("Mettez votre numéro de téléphone.");
          phone.focus();
          return false;
        }
        if (password.value == "") {
          alert("Saisissez votre mot de passe");
          password.focus();
          return false;
        }
       
      }  
    </script>
  <?php

    
	if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['eml'])and isset($_POST['password']) and isset($_POST['telephone']) )
	{
		if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['eml'])and !empty($_POST['password']) and !empty($_POST['telephone']))
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
				$sql2="insert into client(nom, prenom, email,password,telephone) values('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['eml']."','".$_POST['password'].",'".$_POST['telephone'].")";
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