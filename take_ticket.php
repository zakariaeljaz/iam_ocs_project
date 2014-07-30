<?php 
session_start();
include('bdd.php');
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
$login=$_GET['var'];
$id=$_GET['id'];

$reponse = $bdd->prepare(' UPDATE MS_CS  SET taken_by = ( SELECT id FROM users WHERE login = :login) WHERE id = :id');
$reponse->execute (array('id' => $id,'login' => $login));


header('Location: /iam_ocs_project.git/trunk/succes3.php');
?>









