<?php
require_once("initdb.php");
$msg = "";
if (isset($_SESSION['type']))
 {
  header("Location:$_SESSION[page]");
  _exit();
}
$erlist = "";
if (isset($_POST["signup"])) {
  $s = 0;
  if ($_POST["type"] == "mn") {
    if (TRUE === $mysqli->query("INSERT INTO `users` VALUES ('$_POST[ecode]', '$_POST[uname]', '$_POST[pass]', 0)")) {
      if (TRUE === $mysqli->query("INSERT INTO `events`(`code`, `name`, `cat_id`) VALUES ('$_POST[ecode]', '".str_replace("'","&#39;",$_POST['ename'])."', '$_POST[category]')")) {
        $msg = "<span class='color'>Manager signup was successful!</span> ";
        $s = 1;
      } else
      $mysqli->query("DELETE FROM users WHERE username='$_POST[uname]'");
    }
  } else if ($_POST["type"] == "mk") {

    if (TRUE === $mysqli->query("INSERT INTO users values ('-mk', '$_POST[uname]', '$_POST[pass]', 0)")) {
      $msg = "<span class='color'>Marketing Team member signup was successful!</span> ";
      $s = 1;
    }
  } else if ($_POST["type"] == "nu") {

    if (TRUE === $mysqli->query("INSERT INTO users values ('-nu', '$_POST[uname]', '$_POST[pass]', 9)")) {
      $msg = "<span class='color'>Tathva Team member signup was successful!</span> ";
      $s = 0;
    }
  } if ($_POST["type"] == "pr") {

    if (TRUE === $mysqli->query("INSERT INTO users values ('-pr', '$_POST[uname]', '$_POST[pass]', 0)")) {
    $msg = "<span class='color'>Proofreader signup was successful!</span> ";
    $s = 1;
    }
  }
  if ($s == 1)
    $msg .= "<span class='color'>Please wait till an administrator validates your account.</span>";
  else
    $msg = "<span class='color'>Signup failed</span>";
}
?>