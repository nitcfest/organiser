<?php include('font.php');?>

<div id="header13">
	<img id="orglogo" src="tatlogo.png">
	<div class="tatfont" style="
	float:left;
	font-size:400%;
	display: inline;
	margin-left: 10px;">
		<a href="home.php">tathva</a>
		<span class="goodfont" style="font-size:40%; color:white;">organiser</span>
	</div>
	<div class="goodfont headbox">
		<div><a href=""><?php echo $_SESSION['uname']; ?></a></div>
		<div><a href="logout.php">Log out</a></div>
	</div>

	<div class="goodfont headlink"><a href="<?php echo $_SESSION['page']; ?>">Organise</a>
	</div>

	<div class="goodfont headlink"><a href="home.php">Home</a>
	</div>
</div>