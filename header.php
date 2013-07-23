<?php include('font.php');?>

<div id="header13" style="
 	height:10%;
width:100%;
padding-bottom: 15px;
border-bottom: 3px solid brown;
background-color:black;
">
	<img id="orglogo" src="tatlogo.png" style="
	 		float:left; 
	margin-left:10px; 
	margin-top:5px; 
	border-left: 3px solid #444444; 
	border-bottom: 3px solid #444444;"/>
	<div class="tatfont" style="
	float:left;
	font-size:400%;
	display: inline;
	margin-left: 10px;">
		<a href="home.php" style="
		color:#5555DD;
		text-decoration:none;">tathva</a>
		<span class="goodfont" style="font-size:40%; color:white;">organiser</span>
	</div>
	<div class="goodfont" style="
	float:right;
	margin-right: 10px;
    font-size:100%;
    display: inline;
    padding-top: 30px;"><a href="logout.php" style="
		color:#5555DD;
		text-decoration:none;">Log out</a>
	</div>

	<div class="goodfont" style="
	float:right;
	margin-right: 10px;
    font-size:100%;
    display: inline;
    padding-top: 30px;"><a href="<?php echo $_SESSION['page']; ?>" style="
		color:#5555DD;
		text-decoration:none;">Organise</a>
	</div>

	<div class="goodfont" style="
	float:right;
	margin-right: 10px;
    font-size:100%;
    display: inline;
    padding-top: 30px;"><a href="home.php" style="
		color:#5555DD;
		text-decoration:none;">Home</a>
	</div>
</div>