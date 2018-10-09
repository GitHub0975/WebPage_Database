<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>新增花卉流程</title>
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
$id=$_GET["id"];
if ( isset($_POST["porder"])&& isset($_POST["pwork"])&& isset($_POST["pday"])&& isset($_POST["pusage"])&& isset($_POST["pmid"]) ) {
   $PFID = $id;
   $Porder = $_POST["porder"];
   $Pwork = $_POST["pwork"];
   $Pday = $_POST["pday"];
   $Pusage = $_POST["pusage"];
   $PMID = $_POST["pmid"];
   
   // 檢查是否有輸入欄位資料
   if ($PFID != "" && $Porder != ""&&  $Pwork != ""&& $Pday != "") {
      require_once("mycontacts_open.inc");
      mysqli_query($link,'SET NAMES utf8');
      // 建立SQL字串
      $sql = "INSERT INTO process (PFID, Porder,Pwork,Pday,Pusage,PMID) VALUES('";
      $sql.= $PFID."', '".$Porder."','".$Pwork."','".$Pday."','";
      $sql.= $Pusage."','".$PMID."')"; 
      if ( mysqli_query($link, $sql) ) { // 執行SQL指令
        header("Location:managerView.php#flower.php"); // 轉址
      }
      require_once("mycontacts_close.inc");
   }
   else {
       echo "<font color:#FFFFFF>資料尚未填妥!";
  }
}
?>
<center>
<form action="flower_chart_insert.php?id=<?php echo $id ?>" method="post" 
      enctype="multipart/form-data">
<div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">新增流程</th></tr>
<tr><td>花編號:</td>
   <td><?php echo $id ?></td></tr>
<tr><td>順序:</td>
   <td><input type="text" name="porder" style="padding:5px;"
               maxlength="10"/></td></tr>
<tr><td>工作項目:</td>
   <td><input type="text" name="pwork" style="padding:5px;"
             maxlength="10"/></td></tr>
<tr><td>工作天數:</td>
   <td><input type="text" name="pday" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>原料使用量/分:</td>
   <td><input type="text" name="pusage" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>原料編號:</td>
   <td><input type="text" name="pmid" style="padding:5px;"
             maxlength="10"/></td></tr>

 
<tr><td colspan="2" align="center">
   <input type="submit" value="新增"/>
   </td></tr>
</table>
</form>
</div>
<p class="w3-center">
 <a href="managerView.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
</body>
</html>