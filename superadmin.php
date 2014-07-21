
<?php
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
       
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Welcome</h1>
        <p class="lead">Bienvenue dans l'espace superadmin</p>
	<h3>Espace d'authentification </h3>
	<form role="form" method="post" action="loginsuperadmin.php">
  		<div class="form-group">
    		<label for="exampleInputEmail1">Identifiant</label>
   		 <input type="text" class="form-control"  name="username" placeholder="Identifiant">
  		</div>
  		<div class="form-group">
	       <label for="exampleInputPassword1">Password</label>
	       <input type="password" class="form-control"  name="password" placeholder="Mot de passe">
	       <div class="checkbox">
                 <label>
                 <input type="checkbox">Garder ma session active
                 </label>
              </div>
      <button type="submit" class="btn btn-default">Connexion</button>
      </form>
  </div>
	



      </div>

    </div><!-- /.container -->
		


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
