<?php 
session_start();

if($_SESSION['login_type'] == "huawei"){
   header('Location: /iam_ocs_project.git/trunk/adminpage.php');  
  exit();
}
if($_SESSION['login_type'] != "iam"){
   header('Location: /iam_ocs_project.git/trunk/index.php');  
  exit();
}
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
        <h1>Générer un ticket de support</h1><br /><br />
	<form method="post" action="traitement.php">
	  <select class="form-control input-lg" id="type" name="type">
    <option value="">--</option>
	    <option value="MS">MS Maintenance Activity</option>
	    <option value="CS">CS Maintenance Activity</option>
	  </select><br />
    <select class="form-control input-lg" id="priority" name="priority">

    <option value="">--</option>
    <option class="MS" value="low-p">Low Priority</option>
    <option class="MS" value="med-p">Medium Priority</option>
    <option class="MS" value="hi-p">High Priority</option>
    <option class="CS" value="low-s">Low Severity</option>
    <option class="CS" value="med-s">Medium Severity</option>
    <option class="CS" value="hi-s">High Severity</option>
    <option class="CS" value="cri-s">Critical Severity</option>

	  </select>
    
    <br />
	  <div class="input-group input-group-lg">
	    <input type="text" class="form-control" placeholder="Issue Description" name="description">
	    <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Send</button>
	    </span>
	  </div>
	</form>
 
      </div>
      
    </div><!-- /.container -->
    
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://raw.github.com/tuupola/jquery_chained/master/jquery.chained.min.js"></script>
    <script type="text/javascript">
    $("#priority").chained("#type");
    </script>

  </body>
</html>
