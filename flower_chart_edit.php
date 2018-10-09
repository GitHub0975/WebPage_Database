<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>流程編輯</title>
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
$order=$_GET["order"];
$action = $_GET["action"];  // 取得操作種類
require_once("mycontacts_open.inc");
// 執行操作
switch ($action) {
   case "update": // 更新操作    
      $PFID = $_POST["pfid"]; // 取得欄位資料
      $Pwork =$_POST["pwork"];
      $Pday =$_POST["pday"];
      $Pusage =$_POST["pusage"];
      $PMID =$_POST["pmid"];
      $sql = "UPDATE process SET Porder='".$order.
             "' , Pwork='".$Pwork."' , Pday='".$Pday."' , Pusage='".$Pusage."' , PMID='".$PMID."' WHERE PFID='".$id."' AND Porder='".$order."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:managerView.php#flower.php"); // 轉址
      break;
   case "del":    // 刪除操作
      $sql = "DELETE FROM process WHERE PFID='".$id."' AND Porder='".$order."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:managerView.php#flower.php"); // 轉址
      break;
   case "edit":   // 編輯操作
      $sql = "SELECT * FROM process WHERE PFID='".$id."' AND Porder='".$order."'";
      $result = mysqli_query($link, $sql); // 執行SQL指令
      $row = mysqli_fetch_assoc($result); // 取回記錄
      $PFID = $row['PFID']; // 取得欄位name
      $Porder = $order;  // 取得欄位tel
      $Pwork = $row['Pwork'];
      $Pday = $row['Pday'];
      $Pusage = $row['Pusage'];
      $PMID = $row['PMID'];
// 顯示編輯表單
?>
<center>
<form action="flower_chart_edit.php?action=update&id=<?php echo $id ?>&order=<?php echo $order ?>"
      method="post">
<div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">編輯流程<?php echo $id ?></th></tr>
<tr><td>花編號:</td>
   <td><?php echo $PFID ?></td></tr>
<tr><td> 順序:</td>
   <td><input type="text" name="porder" size="20"
    value="<?php echo $Porder ?>"/></td></tr>
<tr><td>工作項目: </td>
   <td><input type="text" name="pwork" size="20"
    value="<?php echo $Pwork ?>"/></td></tr>
<tr><td>工作天數:</td>
   <td><input type="text" name="pday" size="20"
    value="<?php echo $Pday ?>"/></td></tr>
<tr><td>原料使用量/分:</td>
   <td><input type="text" name="pusage" size="20"
    value="<?php echo $Pusage ?>"/></td></tr>
<tr><td>原料編號:</td>
   <td><input type="text" name="pmid" size="20"
    value="<?php echo $PMID ?>"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="更新"/></td></tr>
</table>
</div>
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

