	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#" style="color:green;border-right: groove;">REVITALISASI & MAINTENANCE OPTIC</a>
	    </div>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="admin.php">DATA ODP</a></li>
	        <!-- <li><a href="olt.php">DATA OLT</a></li> -->
	        <li>
				<a class="dropdown-toggle" data-toggle="dropdown">MAINTENANCE <span class="caret"></span></a>
			    <ul class="dropdown-menu">
			      <li><a href="detailorder.php">Manual Tiketing</a></li>
			      <li><a href="ogp.php">On Going Progress</a></li>
			    </ul>
	        </li>
	        <li><a href="history.php">DATA HISTORY</a></li>
	        <li>
	        	<a href="mng-user.php">MNG. USER</a>
				<!-- <a class="dropdown-toggle" data-toggle="dropdown">MNG. USER <span class="caret"></span></a>
			    <ul class="dropdown-menu">
			      <li><a href="">Admin</a></li>	
			      <li><a href="">Assurance</a></li>
			      <li><a href="">Maintenance</a></li>
			    </ul> -->
	        </li>
	        <li>
			    <a class="dropdown-toggle" data-toggle="dropdown">MNG. OKUPANSI <span class="caret"></span></a>
			    <ul class="dropdown-menu">
			      <li><a href="okupansi-assurance.php">Okupansi Assurance</a></li>
			      <li><a href="okupansi-maintenance.php">Okupansi Maintenance</a></li>
			    </ul>
			</li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a><?php echo "<span> login anda : ".$_SESSION['username']."</span>"; ?></a></li>
	        <li><a href="logout.php" class="glyphicon glyphicon-log-out"> LogOut</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>