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
} else if (isset($_POST["signin"])) {
  $user = $mysqli->real_escape_string($_POST['username']);
  $pass = $mysqli->real_escape_string($_POST['password']);
  if ($user == $u_ad && $pass == $p_ad) 
  {
    $_SESSION['type'] = 'AD';
    $_SESSION['uname'] = 'admin';
    $_SESSION['page'] = $ad_page;
    header("Location: home.php");
    _exit();
  } else if ($user == $u_ml && $pass == $p_ml) {
    $_SESSION['uname'] = 'mailer';
    $_SESSION['type'] = 'ML';
    $_SESSION['page'] = $ml_page;
        $_SESSION['uname'] = "mailer";
    header("Location: home.php");
    _exit();
  } else if ($user == $u_cl && $pass == $p_cl) {
    $_SESSION['type'] = 'CL';
    $_SESSION['uname'] = 'collegelist';
    $_SESSION['page'] = $cl_page;
    header("Location: home.php");
    _exit();
  } else if ($user == $u_pl && $pass == $p_pl) {
    $_SESSION['uname'] = 'publist';
    $_SESSION['type'] = 'PL';
    $_SESSION['page'] = $pl_page;
    header("Location: home.php");
    _exit();
  }
  $res = $mysqli->query("select eventcode, validate from users where username='$user' and password='$pass'");
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
      if ($row['eventcode'] == '-pr') 
      {
        $_SESSION['type'] = 'PR';
        $_SESSION['page']=$pr_page;
      } if ($row['eventcode'] == '-mk') 
      {
        $_SESSION['type'] = 'MK';
        $_SESSION['page']=$mk_page;
      } if ($row['eventcode'] == '-nu') 
      {
        $_SESSION['type'] = 'NU';
        $_SESSION['page']=$nu_page;
      } 
      else {
        $_SESSION['type'] = 'MN';
        $_SESSION['ecode'] = $row['eventcode'];
        $_SESSION['page']=$mn_page;
      }
      header("Location: home.php");
      $res->free();
      _exit();
    }
  }
}
?>