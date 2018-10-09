<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>edit.php</title>
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
$date=$_GET["date"];
if(isset($_GET["amount"])) $amount=$_GET["amount"];
$action = $_GET["action"];  // 取得操作種類
require_once("mycontacts_open.inc");
// 執行操作
switch ($action) {
   case "update": // 更新操作    
      $Reprice = $_POST["reprice"]; // 取得欄位資料
      $Reamount = $_POST["reamount"];
     
      $sql = "UPDATE replenish SET Reprice='".$Reprice.
             "', Reamount='".$Reamount."'  WHERE Redate='".$date."' AND ReMID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      $sql="SELECT Mamount FROM material WHERE MID='".$id."'";
      $result=mysqli_query($link, $sql);
      $row=mysqli_fetch_assoc($result);
      $total=$row['Mamount'];
      $total=$total-$amount+$Reamount;
      $sql = "UPDATE material SET Mamount='".$total."'  WHERE MID='".$id."'";
      mysqli_query($link, $sql);
      
      header("Location:replenishA.php"); // 轉址
      break;
   case "del":    // 刪除操作
      $sql = "DELETE FROM plan WHERE PlanID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:planM.php"); // 轉址
      break;
   case "edit":   // 編輯操作
      $sql = "SELECT * FROM replenish WHERE Redate='".$date."' AND ReMID='".$id."'";
      
      $result = mysqli_query($link, $sql); // 執行SQL指令
      $row = mysqli_fetch_assoc($result);
        
        $reprice = $row['Reprice']; // 取得欄位name
        $reamount = $row['Reamount']; 
        
// 顯示編輯表單
?>
<center>
<form action="replenish_edit.php?action=update&id=<?php echo $id ?>&date=<?php echo $date?>&amount=<?php echo $reamount?>"
      method="post">
<div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">編輯進貨單</th></tr>
<tr><td>進貨日期:</td><td> <?php echo $date ?></td></tr>
<tr><td>原料編號:</td><td>  <?php echo $id ?></td><tr>
<td> 單價: </td>
   <td><input type="text" name="reprice" size="20"
   maxlength="20" value="<?php echo $reprice ?>"/></td></tr>
<tr><td>進貨量:</td>
   <td><input type="text" name="reamount" size="20"
   maxlength="20" value="<?php echo $reamount ?>"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="更新"/></td></tr>
</table></div>
</form>
<br/>
 <p class="w3-center">
 <a href="administractor.php#replenish" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
<?php   
       break;
} 
require_once("mycontacts_close.inc");
?>
</body>
</html>