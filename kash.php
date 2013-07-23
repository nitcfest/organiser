<?php
require_once("initdb.php");
if (isset($_SESSION['type'])) 
{
  switch ($_SESSION['type']) 
  {
    case 'MN':
    $level=2;
    case 'MK':
    $level=0;
    case 'PR':
    $level=2;
    case 'AD':
    $level=0;
    case 'ML':
    $level=2;
    case 'CL':
    $level=2;
    case 'PL':
    $level=2;
    case 'NU':
    $level=1;
  }
    echo $level;
    _exit();
} else
{
  _exit("You do not have access to this page");
}
$user=$_SESSION['uname'];
if (isset($_POST["submit"])) 
{
  $in="INSERT INTO  `marketing_contacts` (tel ,tel2 , offer, cmpname ,contactper , status, email, notes, submitted_by) VALUES ('$_POST[tel]',  '$_POST[tel2]', '$_POST[offer]',  '$_POST[cmpname]',  '$_POST[contactper]',  'Check',  '$_POST[email]', '$_POST[notes]', '$_SESSION[uname]');";
  $mysqli->query($in) or die($mysqli->error);
}
?>
<html>
<head>
  <title>Welcome : Tathva 13 Organiser</title>
  <link rel="shortcut icon" href="taticon.png" type="image/png" />
  <link rel="stylesheet" href="style/home.css" type="text/css" media="all" />
  <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="style/kash.css" type="text/css" media="all" />
</head>
<body>
  <?php include('font.php');?>
  <?php include('header.php');?>
  <div id="main">
    <div id="show">
      <?php include('modules/table-marketing');?>
    </div>
    <div id="add">
      <?php include('modules/form-marketing');?>
    </div>
  </div>
  <?php include('footer.php');?>
</body>
</html>