<?php
require_once("initdb.php");
$eventcode = "";
if (isset($_SESSION["type"])) {
  if ($_SESSION["type"] == 'MK' || $_SESSION["type"] == 'AD') {
  } else
    _exit("You don't have permission!");
} else {
  header("Location: $start_page");
  _exit();
}

$query="SELECT cmpname,contactper,,tags,contacts,prize,prtpnt FROM marketing_contacts WHERE code='$eventcode'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$eventname=NULL; $shortdesc=NULL; $longdesc=NULL;
$tags=NULL; $contacts=NULL; $prize=NULL;
if($row)
{
    $eventname=$row['name'];
    $shortdesc=$row['shortdesc'];
    $longdesc=$row['longdesc'];
    $tags=$row['tags'];
    $contacts=$row['contacts'];
    $prize=$row['prize'];
    $prtpnt=$row['prtpnt'];
    $result->free();
}
$mysqli->close();
?>