
<?php
require"../../includes/dbconnect.php";
session_start();
$s_id=$_SESSION["s_id"];
$c_id=$_SESSION["c_id"];
$start_date=$_SESSION["start_date"];
$end_date=$_SESSION["end_date"];

/*var_dump($s_id);
var_dump($c_id);
var_dump($start_date);
var_dump($end_date);*/
$sql= "select s_name from student where s_id='$s_id'";
$result = $conn->query($sql);
//var_dump($result);
$row=$result -> fetch_assoc();//3 steps for finding c_id
$name=$row['s_name'];
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/edu_site/css/chat.css" media="all">
    <script type="text/javascript">
      function ajax(){
        var req = new XMLHttpRequest();//ajax request

        req.onreadystatechange = function(){

          if(req.readyState==4 && req.status==200){//successful action
            document.getElementById('chat').innerHTML=req.responseText;//things we want to change give that id

          }
        }
        req.open('GET','/edu_site/chat/php/chat_ajax.php',true);
        req.send();
      }
      setInterval(function(){ajax()},1000);
    </script>
    <title>Chat System</title>

  </head>
  <body onload="ajax();">
    <div id="container">
      <div class="welcome-msg" style="text-align:center">
        Welcome <?php echo "$name"; ?>
      </div>
      <div id="chat_box">
        <div id="chat">

        </div>
        <!--<?php

          //$query="select * from chat where c_id='$c_id' and start_date='$start_date' and end_date='$end_date' ORDER BY id DESC";
          //$query="select * from chat  ORDER BY id DESC";
          //$run=$conn->query($query);
          //$row=$run->fetch_array();
          //while($row=$run->fetch_array()) :
         ?>
        <div id="chat_data">
          <span style="color:green;"><?php //echo $row['name']  ?></span>:
          <span style="color:brown;"><?php //echo $row['msg']; ?></span>
          <span style="float:right;"><?php //echo formatDate($row['date']); ?></span>
        </div>
        <?php
        //endwhile;
         ?>-->

      </div>
      <form class="" action="/edu_site/chat/php/chat.php" method="post">
        <textarea name="msg" placeholder="enter message"></textarea>
        <input type="submit" name="submit" value="send it">
      </form>

      <?php
      if (isset($_POST['submit'])){
        //$name we have taken
        $msg=$_POST['msg'];
        $insert="insert into chat(name,msg,c_id,start_date,end_date)values('$name','$msg','$c_id','$start_date','$end_date')";
        $run=$conn->query($insert);

      }
       ?>
       <div class="">
         <a href="/edu_site/chat/php/user-controller/logout.php"  >Back</a>
       </div>
    </div>
  </body>
</html>
