<!DOCTYPE html>
<html>
  <head>
    <title>JINGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
  <?php 
  define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME'])); 
  echo "<link href=".BASE_URI."assets/css/bootstrap.css rel='stylesheet' media='screen'>";
  echo "<link href=".BASE_URI."assets/css/bootstrap-responsive.css rel='stylesheet' media='screen'>"; 
  ?>
  </head>
  <body>
    <script src="http://code.jquery.com/jquery.js"></script>
    <?php 
    echo "<script src=".BASE_URI."assets/js/bootstrap.js></script>" ;
    # echo "<script src=".BASE_URI."assets/js/form.js></script>" ;
    ?>    
  <div id="wrap">
  <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="">Project name</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="">Home</a></li>
                <?php if($_SESSION){ ?>
                <li><a href="about">Me</a></li>
                <?php }?>
                <li><a href="about2">About2</a></li>      
              </ul>  
        <ul class="nav pull-right">
          <?php if (!$_SESSION) { ?> <!-- not login yet -->
          <li><a href="/trunk/index.php/login" class ="pull-right"> Sign In </a><li>
          <li><a href="/trunk/index.php/signup" class ="pull-right">JOIN US!</a><li>
          <?php } else { ?> <!-- already login -->            
            <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  Account
                  <b class="caret"></b>
             </a>
           <ul class="dropdown-menu">
               <li><a href="/trunk/index.php/setting/set_profile?uid=<?php echo $_SESSION['user']['uid'];?>" >Setting</a></li>
                <li><a href="/trunk/index.php/logout">Log out</a></li>  
            </ul>

          </li>  
            <?php } ?>
        </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    
  <div class="container"> 
    <!-- insert our page here -->
