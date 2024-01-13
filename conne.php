
   <?php

    
if(isset($_POST[' adresse email']) and isset($_POST['mot de passe']) )
{
    if(!empty($_POST[' adresse email']) and !empty($_POST['mot de passe']))
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
    $sql1="select * from utilisateur where email='".$_POST[' adresse email']."'";
    $reponse = $bdd->query($sql1);
    $donnees = $reponse->fetch();

        if(empty($donnees))
        {   
            $sql2="insert into client(  adresse email, mot de passe) values('".$_POST['email']."','".$_POST['mot de passe'].")";
            $bdd->exec($sql2);
            echo"<center>Utilisateur ".$_POST['email']." est ajouté avec succés</center>";
        }
        else
        echo "<center>Utilisateur existe déja !!!</center>";
    } 
}
?>
