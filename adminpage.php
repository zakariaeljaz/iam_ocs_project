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
    <script src="js/Chart.min.js"></script>

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
            
            <li ><a href="ticket_form.php">Ticket Form</a></li>
            <li class="active"><a href="adminpage.php">Admin Panel</a></li>
          </ul>
          <ul class="nav navbar-nav" style="float : right">
            <li class="navbar-right"> 
              <a href="logout.php">Déconnexion</a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Welcome</h1>
        <p class="lead">Bienvenue <span style="font-weight:bold;"><?php echo strtoupper($_SESSION['username']) ?></span> dans l'espace d'administration des tickets</p>
        <br />
        <br />
        <script type="text/javascript">
         $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
          })
        </script>
        <ul class="nav nav-tabs" role="tablist">
          <li><a href="#encours" role="tab" data-toggle="tab">En cours</a></li>
          <li><a href="#termine" role="tab" data-toggle="tab">Terminé</a></li>
          <li><a href="#ms_stats" role="tab" data-toggle="tab">MS Stats</a></li>
          <li><a href="#cs_stats" role="tab" data-toggle="tab">CS Stats</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          
          <div class="tab-pane" id="encours">
             <ul class="list-group">
            <?php $reponse = $bdd->prepare('SELECT * FROM MS_CS WHERE taken_by = ?'); ?>
            <?php $reponse->execute(array($_SESSION['user_id'])); ?>
            <?php while ($donnees = $reponse->fetch()){ ?>

             <li class="list-group-item">
              <span class="badge"><?php echo $donnees['Priority'] ?></span>
                            <span class="badge"><?php echo $donnees['Issue_type'] ?></span>

                <a class="popover-link" href="edit_ticket.php?id=<?php echo $donnees['id'] ?>" data-toggle="popover" title="Edit ticket"><?php echo $donnees['Issue_description'] ?></a>
            </li>
            <?php } ?>
           
            </ul>
          </div>

          <div class="tab-pane" id="termine">
             <ul class="list-group">
            <?php $reponse = $bdd->prepare('SELECT * FROM MS_CS WHERE taken_by = ?'); ?>
            <?php $reponse->execute(array(-1)); ?>
            <?php while ($donnees = $reponse->fetch()){ ?>

             <li class="list-group-item">
              <span class="badge"><?php echo $donnees['Priority'] ?></span>
                            <span class="badge"><?php echo $donnees['Issue_type'] ?></span>
                            <span class="badge">Closed</span>
                <?php echo $donnees['Issue_description'] ?>
            </li>
            <?php } ?>
           
            </ul>
          </div>


           <div class="tab-pane" id="ms_stats">
             <br />
             <br />
                 <canvas id="buyers" width="400" height="400"></canvas>

          </div>

          <div class="tab-pane" id="cs_stats">
             
          </div>

        </div>
     </div>
  



      </div>

    </div><!-- /.container -->
    
    <script>
        
            // line chart data
            var buyerData = {
                labels : ["January","February","March","April","May","June"],
                datasets : [
                {
                    fillColor : "rgba(172,194,132,0.4)",
                    strokeColor : "#ACC26D",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [203,156,99,251,305,247]
                }
            ]
            }
            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');
            // draw line chart
            new Chart(buyers).Line(buyerData);
            // pie chart data
            
        </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
