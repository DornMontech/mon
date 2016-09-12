<div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Safe-Meter</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">  Home</a></li>
                            <li><a href="suggest.php">  Drink Limit  </a></li>
                            <li><a href="about.php"> About  </a></li>
                            <li><a href="dashboard/pages/index.php">  Profile  </a></li> 
              </ul>
			  <ul class="nav navbar-nav navbar-right">
            
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp; <?php 
			  if( !isset($_SESSION['user']) ) {
				echo "sign in /up";
			   ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign in</a></li>
				<li><a href="register.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign up</a></li>
              </ul>
			  <?php 
			  }
			  else {
			  echo "Hi," .$_SESSION['user'];
			  ?>
			  &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;log-out</a></li>
              </ul>
			  <?php
			  }?>
            </li>
          </ul>
            </div>
			
          </div>