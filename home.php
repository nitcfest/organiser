<?php
require_once("initdb.php");?>
<html>
<head>	
  	<title>Welcome: Tathva 13 Organiser</title>
	<link rel="shortcut icon" href="taticon.png" type="image/png" />
  	<link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
  	<link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
</head>
<body>
	
	<?php include('header.php');?>
	<div id="main">
		<div id="instructions">
			<h4>About Organiser - Tathva CMS</h4>
			Tathva Content Management System (CMS) is a platform for organisers to contribute to certain aspects of Tathva's management, with a lot of emphasis on the content put up in the official website. 
			<?php echo $_SERVER['REMOTE_ADDR'];?>
		</div>
		<div id="showmark">
			<?php include('modules/table-marketing.php');?>		 
		</div> 
		<div id="addmark">
			<?php include('modules/form-marketing.php');?>		 
		</div>
	</div>
	<?php include('footer.php');?>
</body>
</html>