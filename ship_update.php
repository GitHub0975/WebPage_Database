<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>edit.php</title>
</head>
<body text="#FF8000" >
<?php
$action = $_GET["action"];
$date=$_GET["date"];
$market=$_GET["market"];
$boxid=$_GET["boxid"];
$grade=$_GET["grade"];

$id = $_GET["id"];  // 取得URL參數的編號
  // 取得操作種類


require_once("mycontacts_open.inc");
// 執行操作
switch ($action) {
   case "price": // 更新操作    
      $Shprice = $_POST["shprice"]; // 取得欄位資料
      echo $id;
      echo $Shprice;
      echo $date;
      echo $market;
      echo $grade;
      echo $boxid;
      $sql = "UPDATE ship SET Shprice='".$Shprice."' WHERE Shdate='".$date."' AND Market='".$market."' AND BoxID='".$boxid."' AND Grade='".$grade."' AND ShPlanID='".$id."'";
      if(mysqli_query($link, $sql))
                header("Location:administractor.php#ship"); // 轉址
      
      break;
   case "check":    // 核對操作
      $sql = "UPDATE ship SET Shcheck='1' WHERE Shdate='".$date."' AND Market='".$market."' AND BoxID='".$boxid."' AND Grade='".$grade."' AND ShPlanID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:administractor.php#ship"); // 轉址
      break;
      }
 require_once("mycontacts_close.inc");
// 顯示編輯表單
?>

</body>
</html>