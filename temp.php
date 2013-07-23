 <option value="mn">Event Manager</option>
      <option value="pr">Proofreader</option>
    </select><br/>
    <div id="mn_opts">
      <select name="category">
        <option value="">--event category--</option>
        <?php
$res1 = $mysqli->query("select cat_id, name from event_cats where par_cat=-1");
while($row=$res1->fetch_assoc()) {
  $res2 = $mysqli->query("select cat_id, name from event_cats where par_cat=$row[cat_id]");
  if ($res2->num_rows == 0)
    echo "<option value='$row[cat_id]'>$row[name]</option>";
  else {
    echo "<optgroup label='$row[name]'>";
    while ($erow=$res2->fetch_assoc())
      echo "<option value='$erow[cat_id]'>$erow[name]</option>";
    echo "</optgroup>";
  }
  $res2->free();
}
$res1->free();
       ?>
      </select><br/>
      <input type="text" placeholder="Event Name" name="ename"><br/>
      <input type="text" placeholder="Event Code (3 letters)" name="ecode" onchange="javascript:this.value=this.value.toUpperCase();"><br/>
    </div>