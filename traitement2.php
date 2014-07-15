<?php 
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
$summary= $_POST['summary'];    
$recommandation=$_POST['recommandation'];
$type=$_POST['type'];
$date=$_POST['date'];
$ms_type=$_POST['ms_type'];
$node=$_POST['node'];
$entered_by=$_POST['entered_by'];
$onsite=$_POST['onsite'];
$palliative=$_POST['palliative'];






$reponse = $bdd->prepare(' UPDATE MS_CS SET (Summary =:summary, Recommendations =:recommandation ,Type =:type ,MS_type =:ms_type , nodenetwork_element =:nodenetwork_element , Entered_by_iam =:Entered_by_iam , Onsite_presence =:onsite, Paliative_resolution_date :=palliative) WHERE id=:id');
$reponse->execute (array('summary' => $summary,'recommandation'=> $recommandation,'type' => $type, 'ms_type' =>$ms_type, 'node' => $node, 'entered_by'=>$entered_by, 'onsite'=> $onsite, 'palliative'=> $palliative, 'id'=>$_GET['id']));
        
header('Location: /iam_ocs_project.git/trunk/succes2.php');

?>
