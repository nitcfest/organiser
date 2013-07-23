<?php
$query="SELECT username, password, eventcode, validate FROM users";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
if (!$row)
    echo "Waiting for first contact!";
  else 
  {
    echo "<table>";
    echo "  <thead>";
    echo "    <tr><th>Username</th> <th>Password</th> <th>Eventcode</th> <th>Validation</th> <th>Delete</th></tr>";
    echo "  </thead>";
    do {
  $u = $row['username'];
  $x = "exec.php?u=$u";
  $v = "<a href='$x&a=";
  $v .= ($row['validate'] == 0) ? "val'>Validate" : "inv'>Invalidate";
  $v .= "</a>";
  echo "<tr> <td>$u</td> <td>$row[password]</td> <td>$row[eventcode]</td> <td>$v</td> <td><a href='$x&a=del'>Delete</a></td></tr>";
    } while($row=$result->fetch_array());
  }
    ?></table>