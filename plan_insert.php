<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>新增計畫</title>
<h1><marquee direction="right" height="50" scrollamount="5" behavior="alternate">
<span style="font-family:DFKai-sb; color:green;">美谷花卉農場</span></marquee>
</h1>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-btn {width:150px;}
table {
    border-collapse: collapse;
}

th, td {
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #FFFFFF}
th {
    background-color:#3cb371;
    color: white;
}
</style>
</head>
<body style="font-family:DFKai-sb; background-image:url(bbb.jpg); ">
<center>
<?php
if (isset($_POST["planid"]) && isset($_POST["planfid"])&& isset($_POST["planlid"])&& isset($_POST["start"]) ) {
   $PlanID = $_POST["planid"];
   $PlanFID = $_POST["planfid"];
   $PlanLID = $_POST["planlid"];
   $Start = $_POST["start"];
   
   // 檢查是否有輸入欄位資料
   if ($PlanID != "" && $PlanFID != ""&&  $PlanLID != ""&& $Start != "") {
      require_once("mycontacts_open.inc");
      mysqli_query($link,'SET NAMES utf8');
      // 建立SQL字串
     $sql= "SELECT Porder,Pday FROM process WHERE PFID='".$PlanFID."'";
     $result = mysqli_query($link, $sql);
    

$j = 0;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $order[$j]=$rows[0];
    $day[$j]=$rows[1];
    $j=$j+1;
    
 }
   $sql = "INSERT INTO plan (PlanID, PlanFID,PlanLID) VALUES('".$PlanID."', '".$PlanFID."','".$PlanLID."')";
   mysqli_query($link, $sql);
   for ( $i = 0; $i< $j; $i++ ){
    $sql = "INSERT INTO distribution (PlanID, Planorder,Exday,Finish) VALUES('".$PlanID."', '".$order[$i]."','".$Start."','0')"; 
   
      if ( mysqli_query($link, $sql) )  // 執行SQL指令
         header("Location:managerView.php#plan"); // 轉址
      
      
    $s_array = array('+',$day[$i],' days');
    $c=implode( $s_array);
    $a=strtotime($Start);
    $Start=date('Y-m-d', strtotime($c, $a)); //單位秒
    }

      
      require_once("mycontacts_close.inc");
   }
   else 
       echo "<font color:#FFFFFF>資料尚未填妥!";
  
}
?>
<center>
<form action="plan_insert.php" method="post" 
      enctype="multipart/form-data">
   <div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">新增計畫</th></tr>
<tr><td>計畫編號:</td>
   <td><input type="text" name="planid" style="padding:5px;"
               maxlength="10"/></td></tr>
  
<tr><td>花編號:</td>
   <td><input type="text" name="planfid" style="padding:5px;"
             maxlength="10"/></td></tr>
<tr><td>土地編號:</td>
   <td><input type="text" name="planlid" style="padding:5px;"
               maxlength="10"/></td></tr>
<tr><td>耕土日期:</td>
   <td><input type="date" name="start" style="padding:5px;"
              maxlength="10"/></td></tr>

<tr><td colspan="2" align="center">
   <input type="submit" value="新增"/>
   </td></tr>
</table>
</form>
</div>
<br/>
 <p class="w3-center">
 <a href="managerView.php#plan" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
</body>
</html>


