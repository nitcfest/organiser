<html>
<head>
  <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
  <title>Tathva 13 Organiser</title>
  <link rel="shortcut icon" href="taticon.png" type="image/png">
  <link rel="stylesheet" href="style/login.css" type="text/css" media="all" />
  <style type="text/css">
  @font-face
  {
  font-family:Tathva_Cafe;
  src:url("CafeNeroM54.ttf");
  }
  </style>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="login.js"></script>
</head>

<body>
  <noscript><div style="background-color: #FF7777; padding: 20px; font-size: 20px">Please enable Javascript</div></noscript>
  <div style="color:white; position:absolute; margin:8% auto; text-align:center; font-family:Tathva_Cafe; font-size:150%; width:100%">O r g a n i s e r</div>
  <div id="wrapper">
    <div id="info">
      <p>
        <ul>
          <li><h4>Join as Regular User</h4>Help us by adding your marketing contacts</li>
          <li><h4>Join as Marketing Manager</h4>Access marketing contacts added by regular users</li>
          <li><h4>Join as Event Manager - Coming Soon</h4>Add content about your event to be put on tathva.org</li>
        </ul>
      </p>
    </div>
  <div id="supwrap">
  <form action="signup.php" method="post" id="supform">
    <h3>Not yet a member?</h3>
    <input type="text" name="uname" placeholder="Username"><br/>
    <input type="password" name="pass" placeholder="Password"><br/>
    <input type="password" name="repass" placeholder="Retype password"><br/>
    <select id="acctype" name="type">
      <option value="nu">Regular User</option>
      <option value="mk">Marketing Manager</option>
    <input type="submit" name="signup" value="Sign Up">
  </form>
  </div>

  <div id="sinwrap">
  <form action="signin.php" method="post" id="sinform">
    <h3>Login</h3>
    <input type="text" placeholder="Username" name="username"><br/>
    <input type="password" placeholder="Password" name="password"><br/>
    <input type="submit" name="signin" value="Sign In">
  </form>
  </div>
  </div>
</body>
</html>