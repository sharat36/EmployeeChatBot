<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Messenger</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <style>
      body{
        background-image: linear-gradient(to right, #ee9ca7, #ffdde1);
      }
      .navbar-inverse {
          background-color: #702963;
          border-color: #702963; 
      }
      .navbar-inverse .navbar-brand {
          color: white;
      }
      .navbar-inverse .navbar-nav {
          color: white;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle"></button>
            <a class="navbar-brand" href="index.php">Messenger</a>
          </button>
        </div>
        
        <div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
</html>
  