<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>土地編輯</title>
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
      $LID = $_POST["lid"]; // 取得欄位資料
      $LName = $_POST["lname"];
      $Area=$_POST["area"];
      $Situation=$_POST["situation"];
      $sql = "UPDATE land SET LID='".$LID.
             "', LName='".$LName."' , Area='".$Area."' , Situation='".$Situation."' WHERE LID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:managerView.php#land"); // 轉址
      break;
   case "del":    // 刪除操作
      $sql = "DELETE FROM land WHERE LID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:managerView.php#land"); // 轉址
      break;
   case "edit":   // 編輯操作
      $sql = "SELECT * FROM land WHERE LID='".$id."'";
      $result = mysqli_query($link, $sql); // 執行SQL指令
      $row = mysqli_fetch_assoc($result); // 取回記錄
      $LID = $row['LID']; // 取得欄位name
      $LName = $row['LName'];  
      $Area = $row['Area'];
      $Situation = $row['Situation'];
// 顯示編輯表單
?>
<center>
<form action="land_edit.php?action=update&id=<?php echo $id ?>"
      method="post">
<div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">編輯土地<?php echo $LID ?></th></tr>
<tr><td>土地編號:</td>
   <td><input type="text" name="lid" size="20" 
   maxlength="10" value="<?php echo $LID ?>"/></td></tr>
<tr><td>地名: </td>
   <td><input type="text" name="lname" size="20"
   maxlength="20" value="<?php echo $LName ?>"/></td></tr>
<tr><td>面積:</td>
   <td><input type="text" name="area" size="20"
   maxlength="20" value="<?php echo $Area ?>"/></td></tr>
<tr><td>狀況:</td>
   <td style='width:270px'><input type="radio" name="situation" value="0" checked="True">栽種中
   <input type="radio" name="situation" style="padding:5px;" value="<?php echo $Situation ?>">
   採收中<input type="radio" name="situation" style="padding:5px;" value="2">休耕中</td>
   
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