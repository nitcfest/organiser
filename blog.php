<?php
require_once("initdb.php");
if (isset($_SESSION["type"])) {
  if ($_SESSION["type"] == 'BE') {

  } else
    _exit("You don't have permission!");
} else {
  header("Location: $start_page");
  _exit();
}
?>
<html>
<head>
  <title>Welcome : Tathva 13 Organiser</title>
  <link rel="shortcut icon" href="taticon.png" type="image/png" />
    <link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
</head>
<body>
  <?php include('font.php');?>
  <?php include('header.php');?>
  <div id="main">
    Welcome to Tathva Organiser! Blog Editor Page
  </div>
</body>
</html>