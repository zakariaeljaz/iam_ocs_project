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
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>IAM OCS PROJECT</title>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/fileinput.js" type="text/javascript"></script>
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
          <ul class="nav navbar-nav" style="float : right">
            <li class="navbar-right"> 
              <a href="logout.php">Déconnexion</a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div><br /><br /><br />



        <div class="container">
            
        <div class="starter-template">
        <h1><span style="padding : 0px 320px">Générer un ticket de support</span></h1><br /><br />
        <form method="post" action="traitement.php" enctype="multipart/form-data">
        <select class="form-control input-lg" id="type" name="type">
        <option>MS Maintenance Activity</option>
        <option>CS Maintenance Activity</option>
        </select><br />
        <select class="form-control input-lg" id="priority" name="priority">
        <option>Low Priority</option>
        <option>Medium Priority</option>
        <option>High Priority</option>
        </select><br />


    <div class="input-group input-group-lg">
      <input type="text" class="form-control" placeholder="Issue Description" name="description">
      <span class="input-group-addon"></span>
    </div><br />
    
                
                <div class="form-group">
                    <input id="file-1a" type="file" multiple=true class="file" data-preview-file-type="any" data-initial-caption="FILE" data-overwrite-initial="false">
                </div><br />
                
               
                <div class="form-group" style="padding :0px 500px">
                   
                    <button class="btn btn-primary">Send</button>
                    <button class="btn btn-default" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </body>
  <script>
    $("#file-1").fileinput({
        initialPreview: ["<img src='Desert.jpg' class='file-preview-image'>", "<img src='Jellyfish.jpg' class='file-preview-image'>"],
        overwriteInitial: false,
        maxFileSize: 100,
        maxFilesNum: 10
  });
  $("#file-3").fileinput({
    showCaption: false,
    browseClass: "btn btn-primary btn-lg",
    fileType: "any"
  });
    $(".btn-warning").on('click', function() {
        if ($('#file-4').attr('disabled')) {
            $('#file-4').fileinput('enable');
        } else {
            $('#file-4').fileinput('disable');
        }
    });
  </script>
</html>