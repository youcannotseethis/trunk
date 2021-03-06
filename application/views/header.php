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
  echo "<link href=".BASE_URI."assets/css/bootstrap-datetimepicker.min.css rel='stylesheet' media='screen'>"; 
  echo "<link href=".BASE_URI."assets/css/jquery-ui-1.10.3.custom.min.css rel='stylesheet' media='screen'>"; 
 ?>
  </head>
  <body>
    <?php 
	echo "<script src=".BASE_URI."assets/js/jquery.min.js></script>" ;
    echo "<script src=".BASE_URI."assets/js/bootstrap.js></script>" ;
   	echo "<script src=".BASE_URI."assets/js/jquery-ui-1.10.3.custom.min.js></script>" ;
    echo "<script src=".BASE_URI."assets/js/bootstrap-datetimepicker.min.js></script>" 
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
            <a class="brand" href="">Jingo</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="/trunk/index.php/home">Home</a></li>
              	<li><a href="/trunk/index.php/explore">Explore</a></li>
                <li><a href="/trunk/index.php/fakeloc">My Location</a></li>
            	<li><a href="/trunk/index.php/search">Search</a></li> 
                <li><a href="/trunk/index.php/places">Places</a></li>


                <?php if($_SESSION){ ?>
                <li><a href="/trunk/index.php/user?uid=
					<?php
					echo  $_SESSION['user']['uid'];
					?>
					">Profile</a></li>
                <li><a href="/trunk/index.php/filters">Filters</a></li>    
                <?php } ?>
              </ul>  
        <ul class="nav pull-right">
          <?php if (!$_SESSION) { ?> <!-- not login yet -->
          <li><a href="/trunk/index.php/login" class ="pull-right"> Sign In </a><li>
          <li><a href="/trunk/index.php/signup" class ="pull-right">JOIN US!</a><li>
          <?php } else { ?> <!-- already login -->            
            <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  <?php echo $_SESSION['user']['uname'];?>
                  <b class="caret"></b>
             </a>
           <ul class="dropdown-menu">
               <li><a href="/trunk/index.php/setting/set_profile" >Setting</a></li>
                <li><a href="/trunk/index.php/logout">Log out</a></li>  
            </ul>


          </li>  
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['uid'];?>" />
            <?php } ?>
        </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    
  <div class="container"> 
    <!-- insert our page here -->
