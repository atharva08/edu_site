<?php
require"../../includes/dbconnect.php";
session_start();
$s_id=$_SESSION["s_id"];
$c_id=$_SESSION["c_id"];
$start_date=$_SESSION["start_date"];
$end_date=$_SESSION["end_date"];

  $query="select * from chat where c_id='$c_id' and start_date='$start_date' and end_date='$end_date' ORDER BY id DESC";
  //$query="select * from chat  ORDER BY id DESC";
  $run=$conn->query($query);
  //$row=$run->fetch_array();
  while($row=$run->fetch_array()) :
 ?>
<div id="chat_data">
  <span style="color:green;"><?php echo $row['name']  ?></span>:
  <span style="color:brown;"><?php echo $row['msg']; ?></span>
  <span style="float:right;"><?php echo formatDate($row['date']); ?></span>
</div>
<?php
endwhile;
 ?>
