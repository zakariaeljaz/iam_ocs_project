<?php 
session_start();
//var_dump($_SESSION['user_id']);exit();
include('bdd.php');
$req = $bdd->prepare('UPDATE MS_CS SET taken_by = :taken_by, Current_statut =\'Work in progress\' WHERE id = :id');
$req->execute(array(
	'taken_by'=>$_SESSION['user_id'],
	'id'=>$_GET['id']
	));
// Redirection vers la page d'administration
header('Location: /iam_ocs_project.git/trunk/superadmin.php'); 
exit();


 ?>