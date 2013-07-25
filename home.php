<?php
require_once("initdb.php");?>
<html>
<head>	
  	<title>Welcome: Tathva 13 Organiser</title>
	<link rel="shortcut icon" href="taticon.png" type="image/png" />
  	<link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
  	<link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
  	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/home.js"></script>
</head>
<body>
	
	<?php include('header.php');?>
	<div id="margin">
		<div id="showmarkcontainer">
			<h4>Marketing Contacts</h4>
			<div id="showmark">
				<?php include('modules/table-marketing.php');?>		 
			</div> 
		</div>
		<div id="addmarkcontainer">
		  <h4>Add contact</h4>
			<div id="addmark">
			<?php include('modules/form-marketing.php');?>		 
			</div>
		</div>
	</div>
	<div id="main">
		<div id="instructions">
			<h4>About Organiser - Tathva CMS</h4>
			Tathva Content Management System (CMS) is a platform for organisers to contribute to certain aspects of Tathva's management, with a lot of emphasis on the content put up in the official website.
		</div>
	</div>
	<?php include('footer.php');?>
</body>
</html>