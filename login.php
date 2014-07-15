<?php 
//Récupérer les données reçues par le formulaire
$username = $_POST['username'];
$password = $_POST['password'];
//inclure fichier connexion bdd
include('bdd.php');

// On essaye de trouver l'utilisateur dans la bdd
$reponse = $bdd->prepare('SELECT * FROM users WHERE login= ? AND password = ?');
$reponse->execute(array($username,sha1($password)));
$donnees = $reponse->fetch();
if($donnees == NULL){
    header('Location: /iam_ocs_project.git/trunk/index.php');
	exit();
}
else{
	//var_dump($donnees['id']);exit();
	//Début de la session pour stocker l'identifiant et savoir si utilisateur est tjs connecté
	session_start();
	$_SESSION['login_type'] = $donnees['type'];
	$_SESSION['username'] = $username;
	$_SESSION['user_id'] = $donnees['id'];
	//redirection
	if($donnees['type'] == "huawei")
		header('Location: /iam_ocs_project.git/trunk/adminpage.php');
	else
		header('Location: /iam_ocs_project.git/trunk/ticket_form.php');
	exit();
//skdhfkjshdkjfhkshdkfhksjhdkjfhsdf
}

 ?>