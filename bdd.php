<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=iam_ocs_project', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
 ?>