<?php
require_once("initdb.php");
if (isset($_SESSION["type"])) {
  if ($_SESSION["type"] == 'MK') {

  } else
    _exit("You don't have permission!");
} else {
  header("Location: $start_page");
  _exit();
}
if (isset($_POST["submit"])) {
  $in="INSERT INTO  `marketing_contacts` (tel ,tel2 ,nego ,offer ,cmpname ,contactper ,status ,email, submitted_by) VALUES ('$_POST[tel]',  '$_POST[tel2]',  '$_POST[nego]',  '$_POST[offer]',  '$_POST[cmpname]',  '$_POST[contactper]',  '$_POST[status]',  '$_POST[email]', '$_SESSION[uname]');";
  echo $in;
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
      <?php
      $query="SELECT * FROM marketing_contacts";
      $result=$mysqli->query($query);
      $row=$result->fetch_assoc();

      if (!$row)
        echo "Waiting for first contact!";
      else {
        ?>
        <table>
          <thead>
            <tr>
              <th>Sl.</th>
              <th>Company Name</th>
              <th>Contact Person</th>
              <th>Email</th>
              <th>Telephone</th>
              <th>Mobile</th>
              <th>Status</th>
              <th>Offered</th>
              <th>Notes</th>
              <th>By</th>
              <th>Update</th>
            </tr>
          </thead>
          <?php
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
           // echo "<td>"."<a href=edit.php?index=".$row['index'].">edit</a></td>";
            echo "</tr>";
          } while($row=$result->fetch_array());
        }?></table><br/>
    </div>
    <div id="more">
      <div id="add">
      <table class=\"well form-inline\" summary="" >
        <div>Add contact<span class="plus">+</span></div>
      <form  method="post" action="kash.php">
        <tr>
          <td>
          <label  for="cmpname"> Name of the Company  </label>
          </td>
          <td>        
          <input type="text" name="cmpname" value="abcd" autofocus="autofocus" />       
          </td>     
        </tr>       
        <tr>
          <td>
          <label for="contactper">Contact Person </label>
          </td>
          <td>
          <input type="text" name="contactper" value="acdas" />
          </td>
        </tr>
        <tr>
          <td>
          <label  for="email" >Email</label>
          </td>
          <td>
          <input type="email" name="email" value="a@g.c" />
          </td>
        </tr>
        <tr>
          <td>
          <label for="tel" >Telephone</label>
          </td>
          <td>
          <input type="number" min="0" max="9999999999" name="tel" value="234" />  
          </td>
        </tr>
        <tr>
          <td>
          <label for="tel2" >Mobile </label>
          </td>
          <td>
          <input type="number" min="0" max="9999999999" name="tel2" value="234235" />  
          </td>
        </tr> 
        <tr>
          <td>
          <label for="status" >Status Update</label>
          </td>
          <td>
          <select name="status" required="required">
          <option value="Talking">Talking</option>
          <option value="Confirmed">Confirmed</option>
          </select> 
          </td>
        </tr> 
        <tr>
          <td>
          <label for="offer" >Offered</label>
          </td>
          <td>
          <input type="text" name="offer" value="w342 " /> 
          </td>
        </tr> 
        <tr>
          <td>
          <label for="nego" >Notes </label>
          </td>
          <td>
<textarea   rows="10" cols="60" style="display:block; width:340px; height:350px" tabindex="1" dir="ltr" name="nego"></textarea>

          </td>
        </tr> 
        
        <tr>
        <td>
        <br />
        <br />
        <input type="submit" name="submit" value="Submit" />
        </td>       
        </tr>
          
      </form>   
</table>
</div>
<!--      
      <div id="edit">
      <span>Edit contact</span>
      <table class=\"well form-inline\" summary="" >
      <form  method="post" action="editact.php">
      <input type="hidden" value="<?php echo $indupdate ?>" name="indupdate" />
        <tr>
          <td>
          <label  for="cmpname"> Name of the Company  </label>
          </td>
          <td>        
          <input type="text" name="cmpname" value="<?php echo $row['cmpname'] ?>" autofocus="autofocus" />      
          </td>     
        </tr>       
        <tr>
          <td>
          <label for="contactper">Contact Person </label>
          </td>
          <td>
          <input type="text" name="contactper" value="<?php echo $row['contactper'] ?>" />
          </td>
        </tr>
        <tr>
          <td>
          <label  for="email" >Email</label>
          </td>
          <td>
          <input type="email" name="email" value="<?php echo  $row['email'] ?>" />
          </td>
        </tr>
        <tr>
          <td>
          <label for="tel" >Telephone</label>
          </td>
          <td>
          <input type="number" min="0" max="9999999999" name="tel" value="<?php echo $row['tel'] ?>" /> 
          </td>
        </tr>
        <tr>
          <td>
          <label for="tel2" >Mobile </label>
          </td>
          <td>
          <input type="number" min="0" max="9999999999" name="tel2" value="<?php echo $row['tel2'] ?>" /> 
          </td>
        </tr> 
        <tr>
          <td>
          <label for="status" >Status Update</label>
          </td>
          <td>
          <select name="status" required="required">
          <option value="Talking">Talking</option>
          <option value="Confirmed">Confirmed</option>
          </select> 
          </td>
        </tr> 
        <tr>
          <td>
          <label for="offer" >Offered</label>
          </td>
          <td>
          <input type="text" name="offer" value="<?php echo $row['offer'] ?>" />  
          </td>
        </tr> 
        <tr>
          <td>
          <label for="nego" >Notes </label>
          </td>
          <td>
            <textarea   rows="10" cols="60" style="display:block; width:340px; height:350px" tabindex="1" dir="ltr"  name="nego"><?php echo $row['nego'] ?> </textarea>
          </td>
        </tr>
        <tr>
        <td>
        </td>     
        <td>      
          <input type="submit" value="Update" />
        </td> 
        </tr>
        
      </form>   
</table>
-->
    </div>
  </div>
</body>
</html>