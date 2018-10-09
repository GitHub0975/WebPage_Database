<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>新增進貨單</title>
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
<?php

if (isset($_POST["redate"]) && isset($_POST["reprice"])&& isset($_POST["reamount"])&& isset($_POST["remid"]) ) {
   $Redate = $_POST["redate"];
   $Reprice = $_POST["reprice"];
   $Reamount = $_POST["reamount"];
   $ReMID = $_POST["remid"];
   
   // 檢查是否有輸入欄位資料
   if ($Redate != "" && $Reprice != ""&&  $Reamount != ""&& $ReMID != "" ) {
      require_once("mycontacts_open.inc");
      mysqli_query($link,'SET NAMES utf8');
      // 建立SQL字串
      $sql = "INSERT INTO replenish (Redate, Reprice,Reamount,ReMID ) VALUES('";
      $sql.= $Redate."', '".$Reprice."','".$Reamount."','".$ReMID."')"; 
      if ( mysqli_query($link, $sql) )  // 執行SQL指令
      {
         echo "<center><span style='font-family:DFKai-sb; color:red;'>新增成功!</span><br/>";
      }
      $sql="SELECT Mamount FROM material WHERE MID='".$ReMID."'";
      $result=mysqli_query($link, $sql);
      $row=mysqli_fetch_assoc($result);
      $total=$row['Mamount'];
      $total=$total+$Reamount;
      $sql = "UPDATE material SET Mamount='".$total."'  WHERE MID='".$ReMID."'";
      mysqli_query($link, $sql);
      require_once("mycontacts_close.inc");
   }
   else {
       echo "<font color:#FFFFFF>資料尚未填妥!";
  }
}
?>
<center>
<form action="replenish_insert.php" method="post" 
      enctype="multipart/form-data">
  <div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">新增進貨單</th></tr>

<tr><td>進貨日期:</td>
   <td><input type="date" name="redate" style="padding:5px;"
              maxlength="10"/></td></tr>
  
<tr><td>單價:</td>
   <td><input type="text" name="reprice" style="padding:5px;"
               maxlength="10"/></td></tr>
<tr><td>進貨量:</td>
   <td><input type="text" name="reamount" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>原料編號:</td>
   <td><input type="text" name="remid" style="padding:5px;"
               maxlength="10"/></td></tr>
<tr><td colspan="2" align="center">
   <input type="submit" value="新增"/>
   </td></tr>
</table>
</form>
</div>
<br/>
 <p class="w3-center">
 <a href="administractor.php#replenish" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
</body>
</html>

