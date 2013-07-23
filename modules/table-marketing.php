<h4>Marketing Contacts</h4>
<?php
if(!isset($level)||$level==1)
{
  $query="SELECT cmpname,status FROM marketing_contacts";
  $result=$mysqli->query($query);
  $row=$result->fetch_assoc();
  $index=0;
  if (!$row)
    echo "Waiting for first contact!";
  else 
  {
    echo "<table>";
    echo " <thead>";
    echo "   <tr>";
    echo "     <th>Sl.</th>";
    echo "     <th>Company Name</th>";
    echo "     <th>Status</th>";
    echo "   </tr>";
    echo " </thead>";
    do 
    {
      $index = $index+1;
      echo "<tr>";
      echo "<td>".$index."</td>";
      echo "<td>".$row['cmpname']."</td>";
      echo "<td>".$row['status']."</td>";
      echo "</tr>";
    } while($row=$result->fetch_array());
  }
}
else if($level==2)
{
  $query="SELECT * FROM marketing_contacts";
  $result=$mysqli->query($query);
  $row=$result->fetch_assoc();
  if (!$row)
    echo "Waiting for first contact!";
  else {
    echo "<table>";
    echo " <thead>";
    echo "   <tr>";
    echo "     <th>Sl.</th>";
    echo "     <th>Company Name</th>";
    echo "     <th>Contact Person</th>";
    echo "     <th>Email</th>";
    echo "     <th>Telephone</th>";
    echo "     <th>Mobile</th>";
    echo "     <th>Status</th>";
    echo "     <th>Offered</th>";
    echo "     <th>Notes</th>";
    echo "     <th>By</th>";
    echo "   </tr>";
    echo " </thead>";

    do {
      $index = $row['index'];
      echo "<tr>";
      echo "<td>".$row['index']."</td>";
      echo "<td>".$row['cmpname']."</td>";
      echo "<td>".$row['contactper']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['tel']."</td>";
      echo "<td>".$row['tel2']."</td>";
      echo "<td>".$row['status']."</td>";
      echo "<td>".$row['offer']."</td>";
      echo "<td>".$row['nego']."</td>";
      echo "<td>".$row['submitted_by']."</td>";
      echo "</tr>";
    } while($row=$result->fetch_array());
  } 
}
else if($level==0)
{
  $query="SELECT * FROM marketing_contacts";
  $result=$mysqli->query($query);
  $row=$result->fetch_assoc();
  if (!$row)
    echo "Waiting for first contact!";
  else {
    echo "<table>";
    echo " <thead>";
    echo "   <tr>";
    echo "     <th>Sl.</th>";
    echo "     <th>Company Name</th>";
    echo "     <th>Contact Person</th>";
    echo "     <th>Email</th>";
    echo "     <th>Telephone</th>";
    echo "     <th>Mobile</th>";
    echo "     <th>Status</th>";
    echo "     <th>Offered</th>";
    echo "     <th>Notes</th>";
    echo "     <th>By</th>";
    echo "     <th>Update</th>";
    echo "     <th>Delete</th>";
    echo "   </tr>";
    echo " </thead>";

    do {
      $index = $row['index'];
      echo "<tr>";
      echo "<td>".$row['index']."</td>";
      echo "<td>".$row['cmpname']."</td>";
      echo "<td>".$row['contactper']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['tel']."</td>";
      echo "<td>".$row['tel2']."</td>";
      echo "<td>".$row['status']."</td>";
      echo "<td>".$row['offer']."</td>";
      echo "<td>".$row['nego']."</td>";
      echo "<td>".$row['submitted_by']."</td>";
      echo "</tr>";
    } while($row=$result->fetch_array());
  } 
}
echo "</table><br/>";
?>