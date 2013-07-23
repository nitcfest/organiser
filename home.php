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
			<ul>
			<b><u>Web Admins</u></b>
				<li><b>Validation:</b>Nithin Mohan - 7293333314</li>
				<li><b>Validation:</b>Tarun Uday - 9633258889</li>
			</ul>
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