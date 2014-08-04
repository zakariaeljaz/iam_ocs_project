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
           </ul>
           <ul class="nav navbar-nav" style="float : right;">
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
  <form class="form-horizontal" role="form" method="post" action="traitement2.php?id=<?php echo $donnees['id']; ?>">
  <div class="form-group">
        <input type="hidden" name="type" value="<?php echo $donnees['id']; ?>">
        <input type="hidden" name="email" value="<?php echo $donnees['email']; ?>">

    <label class="col-sm-2 control-label">Priority</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" name="priority" value="<?php echo $donnees['Priority'] ?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Issue type</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" name="issue_type" value="<?php echo $donnees['Issue_type'] ?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Issue description</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" name="description" type="text" value="<?php echo $donnees['Issue_description'] ?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">Summary</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="summary" value="" name="summary"><?php if (isset($donnees['Summary'])){echo $donnees['Summary']; }?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">Recommandation</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="recommandation" value="" name="recommandation"><?php if (isset($donnees['Recommendations'])){echo $donnees['Recommendations']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" id="type" value="<?php if (isset($donnees['Type'])){echo $donnees['Type']; }?>" name="type">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">MS Type</label>
    <div class="col-sm-10">
      <input class="form-control" id="ms_type" type="text" value="<?php if (isset($donnees['MS_Type'])){echo $donnees['MS_Type']; } ?>" name="ms_type">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Node/Network Element</label>
    <div class="col-sm-10">
      <input class="form-control" id="node" type="text" value="<?php if (isset($donnees['Nodenetwork_element'])){echo $donnees['Nodenetwork_element']; }?>" name="node">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Entered by (IAM)</label>
    <div class="col-sm-10">
      <input class="form-control" id="entered_by" type="text" value="<?php if (isset($donnees['entered_by_iam'])){echo $donnees['entered_by_iam']; } ?>" name="entered_by">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Onsite presence</label>
    <div class="col-sm-10">
      <input class="form-control" id="onsite" type="text" value="<?php if (isset($donnees['Onsite_presence'])){echo $donnees['Onsite_presence']; } ?>" name="onsite">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Palliative resolution date </label>
    <div class="col-sm-10">
      <input class="form-control" id="palliative" type="date" name="palliative">
    </div>
  </div>
  <button type="submit" class="btn btn-default btn-lg">Update ticket</button>
  <a class="btn btn-default btn-lg" href="close_ticket.php?id=<?php echo $_GET['id'] ?>" role="button">Close ticket</a>

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
