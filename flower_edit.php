<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>花編輯</title>
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
$id = $_GET["id"];  // 取得URL參數的編號
$action = $_GET["action"];  // 取得操作種類
require_once("mycontacts_open.inc");
// 執行操作
switch ($action) {
   case "update": // 更新操作    
      $FID = $_POST["fid"]; // 取得欄位資料
      $FName = $_POST["fname"];
      $Growth=$_POST["growth"];
      $Production=$_POST["production"];
      $Season=$_POST["season"];
      $sql = "UPDATE flower SET FID='".$id.
             "', FName='".$FName."' , Growth='".$Growth."' , Production='".$Production."' , Season='".$Season."' WHERE FID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:managerView.php#flower"); // 轉址
      break;
   case "del":    // 刪除操作
      $sql = "DELETE FROM flower WHERE FID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:managerView.php#flower"); // 轉址
      break;
   case "edit":   // 編輯操作
      $sql = "SELECT * FROM flower WHERE FID='".$id."'";
      $result = mysqli_query($link, $sql); // 執行SQL指令
      $row = mysqli_fetch_assoc($result); // 取回記錄
      $FID = $row['FID']; // 取得欄位name
      $FName = $row['FName'];  
      $Growth = $row['Growth'];
      $Production = $row['Production'];
      $Season = $row['Season'];
// 顯示編輯表單
?>
<center>
<form action="flower_edit.php?action=update&id=<?php echo $id ?>"
      method="post">
<div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">編輯花卉<?php echo $FID ?></th></tr>
<tr><td>花編號:</td>
   <td><input type="text" name="fid" size="20" 
   maxlength="10" value="<?php echo $FID ?>"/></td></tr>
<tr><td>花名: </td>
   <td><input type="text" name="fname" size="20"
   maxlength="20" value="<?php echo $FName ?>"/></td></tr>
<tr><td>生長期/天:</td>
   <td><input type="text" name="growth" size="20"
   maxlength="20" value="<?php echo $Growth ?>"/></td></tr>
<tr><td>產期/天:</td>
   <td><input type="text" name="production" size="20"
   maxlength="20" value="<?php echo $Production ?>"/></td></tr>
<tr><td>夏/冬:</td>
   <td><input type="text" name="season" size="20"
   maxlength="20" value="<?php echo $Season ?>"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="更新"/></td></tr>
</table></div>
</form>
<br/>
 <p class="w3-center">
 <a href="managerView.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
<?php   
       break;
} 
require_once("mycontacts_close.inc");
?>
</body>
</html>