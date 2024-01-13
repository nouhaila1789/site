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
        font-size: 20px;
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
    <h2 style="text-align: center">CONNEXION</h2>
    <form name="RegForm" action="siteweeb.html" onsubmit="return formulaire()" method="post" class="formulaire">
      
      <div>
        <label for="E-mail">Adresse Email:</label>
        <input type="text" id="E-mail" size="60" name="Email" />
      </div>
      <br />
      <div>
        <label for="Mot de passe">password:</label>
        <input type="text" id="Mot de passe" size="60" name="Mot de passe" />
      </div>
      <br />
      <div class="buttons">
        <input type="submit" value="connexion" name="connexion" />
        <p>Vous n'avez pas de compte ? <a href="c:\Users\User\test\foormulairetest.html">Inscrivez-vous</a></p>  
      </div>
    </form>
    <script>
      function formulaire() {
        if (document.getElementById("mot de passee").value == "") { alert("Veuillez taper votre mot de passe!"); return false;}
       
    
       if (document.getElementById("email").value == "") { alert("Veuillez entrer votre adresse e-mail!"); return false;}
      if (document.getElementById("email").value.indexOf('@') == -1) { alert("Adresse e-mail incorrecte!"); return false; }    
   }
        <?php

    
if(isset($_POST['email']) and isset($_POST['mot de passe']) )
{
    if(!empty($_POST['email']) and !empty($_POST['mot de passe']))
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
    $sql1="select * from utilisateur where email='".$_POST['email']."'";
    $reponse = $bdd->query($sql1);
    $donnees = $reponse->fetch();

        if(empty($donnees))
        {   
            $sql2="insert into utilisateur( email, mot de passe) values('".$_POST['email']."','".$_POST['mot de passe'].")";
            $bdd->exec($sql2);
            echo"<center>Utilisateur ".$_POST['email']." est ajouté avec succés</center>";
        }
        else
        echo "<center>Utilisateur existe déja !!!</center>";
    } 
}
?>

       
      
    </script>
  </body>
</html>