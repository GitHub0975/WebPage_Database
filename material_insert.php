<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>新增花卉</title>
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

if (isset($_POST["mid"]) && isset($_POST["mname"])&& isset($_POST["munit"]) ) {
   $MID = $_POST["mid"];
   $MName = $_POST["mname"];
   $Munit = $_POST["munit"];
   
   // 檢查是否有輸入欄位資料
   if ($MID != "" && $MName != ""&&  $Munit != "") {
      require_once("mycontacts_open.inc");
      mysqli_query($link,'SET NAMES utf8');
      // 建立SQL字串
      $sql = "INSERT INTO material (MID, MName,Munit) VALUES('".$MID."', '".$MName."','".$Munit."')"; 
      if ( mysqli_query($link, $sql) ) { // 執行SQL指令
         header("Location:managerView.php#flower"); // 轉址
      }
      else
        echo "ddd";
      require_once("mycontacts_close.inc");
   }
   else {
       echo "<font color:#FFFFFF>資料尚未填妥!";
  }
}
?>
<center>
<form action="material_insert.php" method="post" 
      enctype="multipart/form-data">
   <div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">新增原料</th></tr>
<tr><td>原料編號:</td>
   <td><input type="text" name="mid" style="padding:5px;"
              maxlength="10"/></td></tr>
  
<tr><td>原料名:</td>
   <td><input type="text" name="mname" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>原料單位:</td>
   <td><input type="text" name="munit" style="padding:5px;"
              maxlength="10"/></td></tr>
              
<tr><td colspan="2" align="center">
   <input type="submit" value="新增"/>
   </td></tr>
</table>
</form>
</div>
<br/>
<p class="w3-center">
 <a href="managerView.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
</body>
</html>