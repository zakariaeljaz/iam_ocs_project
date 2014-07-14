<?php 
session_start();
if($_SESSION['login_type'] == "iam"){
   header('Location: /iam_ocs_project.git/trunk/ticket_form.php');  
  exit();
}
if($_SESSION['login_type'] != "huawei"){
   header('Location: /iam_ocs_project.git/trunk/index.php');  
  exit();
}
include('bdd.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>IAM OCS PROJECT</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IAM OCS PROJECT</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
	    <li ><a href="index.php">Accueil</a></li>
             <li class="active"><a href="ticket_form.php">Ticket Form</a></li>
            <li><a href="adminpage.php">Admin Panel</a></li>
            <li> <a href="logout.php">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Mettre à jour un ticket de support</h1><br /><br />
        <?php $reponse = $bdd->prepare('SELECT * FROM MS_CS WHERE id = ?'); ?>
            <?php $reponse->execute(array($_GET['id'])); ?>
            <?php while ($donnees = $reponse->fetch()){ ?>
	<form class="form-horizontal" role="form" method="post" action="traitement2.php">
  <div class="form-group">
    <label class="col-sm-2 control-label">Priority</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $donnees['Priority'] ?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Issue type</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $donnees['Issue_type'] ?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Issue description</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $donnees['Issue_description'] ?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">Summary</label>
    <div class="col-sm-10">
      <textarea class="form-control"  placeholder="Summary here..."></textarea>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">Recommandation</label>
    <div class="col-sm-10">
      <textarea class="form-control"  placeholder="Recommandation here..."></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" placeholder="type here...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Date identified</label>
    <div class="col-sm-10">
      <input class="form-control" type="date" placeholder="type here...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">MS Type</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" placeholder="MS type here...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Node/Network Element</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" placeholder="Node/Network Element here...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Entered by (IAM)</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" placeholder="Entered by (IAM) here...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Onsite presence</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" placeholder="Onsite presence here...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Palliative resolution date </label>
    <div class="col-sm-10">
      <input class="form-control" type="date" placeholder="Palliative resolution date here...">
    </div>
  </div>
  <button type="submit" class="btn btn-default btn-lg">Update ticket</button>
  <a class="btn btn-default btn-lg" href="#" role="button">Close ticket</a>

</form>

  <?php } ?>
        </div>
      
    </div><!-- /.container -->
    
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
