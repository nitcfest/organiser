<?php include("signup.php");?>
<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">

  <title>Tathva 13 Organiser</title>
  <link rel="shortcut icon" href="taticon.png" type="image/png">
  <style type="text/css">
  @font-face
  {
	font-family:Tathva_Cafe;
	src:url("CafeNeroM54.ttf");
  }
  body {
	background-image:url("cms.jpg");
	background-size:100%;
  }
  #wrapper {
	display: none;
	width: 100%;
	min-width: 1024px;
	margin: auto;
	text-align: center;
  }
  #sinwrap, #supwrap {
	padding: 10px;
	border: 1px solid gray;
	border-radius: 3px;
	background-color: rgba(0,0,0,0.5);
	color:white;
	margin: 10px;
  }
  #supwrap {
	position:absolute;
	top:250px;
	right:100px;
  }
  #sinwrap {
	position:absolute;
	top:100px;
	right:100px;
  }
  #sinwrap h3, #supwrap h3 {
	margin: 0 0 5px;
  }
  input[type=password], input[type=text] {
	width: 180px;
  }
  .color
  {
	color:white;
	font-weight:bold;
  }
  #erlist {
	position: absolute;
	background: rgba(240,240,240,0.8);
	z-index: 99;
  }
  </style>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript">
function validatesup() {
  var un=this.uname.value;
  var p=this.pass.value;
  var rp=this.repass.value;
  var t=this.type.value;
  var c=this.category.value;
  var en=this.ename.value;
  var ec=this.ecode.value;
  var unex=/^[a-z]+$/;
  var ecex=/^[A-Z]+$/;

  if (!un || !p || !rp || (t == "mn" && (!c || !en || !ec))) {
	alert("Please fill in all the fields!");
	return false;
  }
  if (!un.match(unex)) {
	alert("Username should contain only lowercase alphabets.");
	return false;
  }
  if (p != rp) {
	alert("Passwords don't match");
	return false;
  }
  if(t == "mn" && (ec.length!=3 || !ec.match(ecex))) {
	alert("Event code must be 3 alphabets.");
	return false;
  }
}

function validatesin() {
  var u = this.username.value;
  var p = this.password.value;

  if(!u || !p) {
	alert("Please fill in all the fields");
	return false;
  }
}

$(document).ready(function() {
  $("#acctype").change(function() {
  var c=$(this).val();
  if(c=="mn")
	$("#mn_opts").show();
  else
	$("#mn_opts").hide();
  });
  $("#supform").submit(validatesup);
  $("#sinform").submit(validatesin);
  $("#wrapper").show();
});

  </script>
</head>

<body>
  <?php
if ($erlist) {
  $res = $mysqli->query("SELECT name FROM events WHERE code='$erlist'");
  if ($row=$res->fetch_assoc()) {
	$erlname = $row['name'];
	$res->free();
	echo "<div id='erlist'><h3 style='margin:10px 0'>$erlname Registration List</h3>";
  ?>
  <table>
    <tr><th>Team ID</th><th>Tathva ID</th><th>Name</th><th>Phone no.</th><th>eMail</th><th>College</th></tr>
    <?php
	$res = $mysqli->query("SELECT e.team_id, e.tat_id, s.name as name, s.phone, s.email, c.name as clg FROM event_reg e INNER JOIN student_reg s ON e.tat_id=s.id INNER JOIN colleges c ON s.clg_id=c.id WHERE e.code='$erlist'");
	while($row=$res->fetch_assoc())
	  echo "<tr><td>$row[team_id]</td><td>$row[tat_id]</td><td>$row[name]</td><td>$row[phone]</td><td>$row[email]</td><td>$row[clg]</td></tr>";
    ?>
  </table></div>
  <?php
	$res->free();
  } else $res->free();
}
  ?>
  <noscript>
  <div style="background-color: #FF7777; padding: 20px; font-size: 20px">Please enable Javascript</div>
  </noscript>
  <div id="wrapper">
  <h1 style="color:black; position:relative; top:160px; font-family:Tathva_Cafe; ">TATHVA '13 Organiser</h1>
  <?php echo $msg; ?>
  <div id="supwrap">
  <form action="login.php" method="post" id="supform">
    <h3>Not yet a member?</h3>
    <input type="text" name="uname" placeholder="Username"><br/>
    <input type="password" name="pass" placeholder="Password"><br/>
    <input type="password" name="repass" placeholder="Retype password"><br/>
    <select id="acctype" name="type">
      <option value="mn">Event Manager</option>
      <option value="be">Blog Editor</option>
      <option value="pr">Proofreader</option>
    </select><br/>
    <div id="mn_opts">
      <select name="category">
        <option value="">--event category--</option>
        <?php
$res1 = $mysqli->query("select cat_id, name from event_cats where par_cat=-1");
while($row=$res1->fetch_assoc()) {
  $res2 = $mysqli->query("select cat_id, name from event_cats where par_cat=$row[cat_id]");
  if ($res2->num_rows == 0)
    echo "<option value='$row[cat_id]'>$row[name]</option>";
  else {
    echo "<optgroup label='$row[name]'>";
    while ($erow=$res2->fetch_assoc())
      echo "<option value='$erow[cat_id]'>$erow[name]</option>";
    echo "</optgroup>";
  }
  $res2->free();
}
$res1->free();
        ?>
      </select><br/>
      <input type="text" placeholder="Event Name" name="ename"><br/>
      <input type="text" placeholder="Event Code (3 letters)" name="ecode" onchange="javascript:this.value=this.value.toUpperCase();"><br/>
    </div>
    <input type="submit" name="signup" value="Sign Up">
  </form>
  </div>

  <div id="sinwrap">
  <form action="login.php" method="post" id="sinform">
    <h3>Login</h3>
    <input type="text" placeholder="Username" name="username"><br/>
    <input type="password" placeholder="Password" name="password"><br/>
    <input type="submit" name="signin" value="Sign In">
  </form>
  </div>
  </div>
</body>
</html>
<?php _exit(); ?>