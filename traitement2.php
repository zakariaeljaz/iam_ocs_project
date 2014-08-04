<?php 
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=iam_ocs_project', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

    //récupérer les données du formulaire
$id=$_GET['id'];
$summary= $_POST['summary'];
$recommandation= $_POST['recommandation'];
$type=$_POST['type'];
$ms_type=$_POST['ms_type'];
$node= $_POST['node'];
$entered_by= $_POST['entered_by'];
$onsite= $_POST['onsite'];
$palliative= $_POST['palliative'];


include('email.php');


$reponse = $bdd->prepare(' UPDATE MS_CS  SET Summary = :summary, Recommendations = :recommandation, Type = :type, MS_type = :ms_type, Nodenetwork_element = :node, Onsite_presence = :onsite, Entered_by_iam = :entered_by, Palliative_resolution_date = :palliative WHERE id = :id');
$reponse->execute (array(
     'id' => $id,
	 'summary' => $summary,
	 'recommandation'=> $recommandation,
	 'type' => $type,
	 'ms_type' => $ms_type, 
	 'node' => $node, 
	 'entered_by' => $entered_by, 
	 'onsite' => $onsite, 
	 'palliative' => $palliative,));
						
header('Location: /iam_ocs_project.git/trunk/succes2.php');

?>
