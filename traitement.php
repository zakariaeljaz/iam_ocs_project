<?php 
//var_dump($_POST['description']);exit();
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=iam_ocs_project', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
	

//récupérer les données du formulaire
				$description= $_POST['description'];
				if(empty($_POST['description'])) 		// Vérifier si le champs issue description est vide
				echo 'Merci de saisir une description !';
				else { $priority=$_POST['priority'];
          			       $type=$_POST['type'];
$reponse = $bdd->prepare(' INSERT INTO MS_CS (Priority,Issue_description,Issue_type) VALUES(:priority, :description, :type)');
$reponse->execute (array('priority' => $priority,'description'=> $description,'type' => $type));
					}	
    header('Location: /iam_ocs_project.git/trunk/succes.php');

?>
