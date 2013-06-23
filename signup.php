<?php
require_once("initdb.php");
$msg = "";
if (isset($_SESSION['type'])) {
  switch ($_SESSION['type']) {
    case 'MN':
    header("Location: $mn_page");
    _exit();
    case 'BE':
     $organiser = $be_page;
    header("Location: $be_page");
    _exit();
    case 'PR':
    header("Location: $pr_page");
    _exit();
    case 'AD':
    header("Location: $ad_page");
    _exit();
    case 'ML':
    header("Location: $ml_page");
    _exit();
    case 'CL':
    header("Location: $cl_page");
    _exit();
    case 'PL':
    header("Location: $pl_page");
    _exit();
  }
}
$erlist = "";
if (isset($_POST["signup"])) {
  $s = 0;
  if ($_POST["type"] == "mn") {
    if (TRUE === $mysqli->query("INSERT INTO `managers` VALUES ('$_POST[ecode]', '$_POST[uname]', '$_POST[pass]', 0)")) {
      if (TRUE === $mysqli->query("INSERT INTO `events`(`code`, `name`, `cat_id`) VALUES ('$_POST[ecode]', '".str_replace("'","&#39;",$_POST['ename'])."', '$_POST[category]')")) {
        $msg = "<span class='color'>Manager signup was successful!</span> ";
        $s = 1;
      } else
      $mysqli->query("DELETE FROM managers WHERE username='$_POST[uname]'");
    }
  }
  if ($_POST["type"] == "be") {

    if (TRUE === $mysqli->query("INSERT INTO managers values ('-be', '$_POST[uname]', '$_POST[pass]', 0)")) {
      $msg = "<span class='color'>Blog Editor signup was successful!</span> ";
      $s = 1;
    }
  } else if (TRUE === $mysqli->query("INSERT INTO managers values ('-pr', '$_POST[uname]', '$_POST[pass]', 0)")) {
    $msg = "<span class='color'>Proofreader signup was successful!</span> ";
    $s = 1;
  }
  if ($s == 1)
    $msg .= "<span class='color'>Please wait till an administrator validates your account.</span>";
  else
    $msg = "<span class='color'>Signup failed</span>";
} else if (isset($_POST["signin"])) {
  $user = $mysqli->real_escape_string($_POST['username']);
  $pass = $mysqli->real_escape_string($_POST['password']);
  if ($user == $u_ad && $pass == $p_ad) {
    $_SESSION['type'] = 'AD';
    $organiser = $ad_page;
    header("Location: home.php");
    _exit();
  } else if ($user == $u_ml && $pass == $p_ml) {
    $_SESSION['type'] = 'ML';
    $organiser = $ml_page;
    header("Location: home.php");
    _exit();
  } else if ($user == $u_cl && $pass == $p_cl) {
    $_SESSION['type'] = 'CL';
    $organiser = $cl_page;
    header("Location: home.php");
    _exit();
  } else if ($user == $u_pl && $pass == $p_pl) {
    $_SESSION['type'] = 'PL';
    $organiser = $pl_page;
    header("Location: home.php");
    _exit();
  }
  $res = $mysqli->query("select eventcode, validate from managers where username='$user' and password='$pass'");
  if ($res->num_rows == 0)
    $msg = "<span class='color'>Invalid Username or Password!</span>";
  else 
  {
    $row = $res->fetch_assoc();
    if ($row['validate'] == 0)
     {
      $msg = "<span class='color'>Your account needs to be validated!.</span>";
      $erlist = $row['eventcode'];
      if ($erlist == '-pr') $erlist = '';
    } 
    else {
      $_SESSION['uname'] = $user;
      if ($row['eventcode'] == '-pr') {
        $_SESSION['type'] = 'PR';
        header("Location: home.php");
      }if ($row['eventcode'] == '-mk') {
        $_SESSION['type'] = 'MK';
      header("Location: home.php");

      }if ($row['eventcode'] == '-be') {
        $_SESSION['type'] = 'BE';
      header("Location: home.php");

      } 
      else {
        $_SESSION['type'] = 'MN';
        $_SESSION['ecode'] = $row['eventcode'];
      header("Location: home.php");
      }
      $res->free();
      _exit();
    }
  }
}
?>