<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>edit.php</title>
</head>
<body text="#FF8000"  >
<?php
$id = $_GET["planid"];  // 取得URL參數的編號
$order=$_GET["order"];
echo $order;
$action = $_GET["action"];  // 取得操作種類
require_once("mycontacts_open.inc");
// 執行操作
if ($action=="update") { 
      $Fiday = $_POST["fiday"]; // 取得欄位資料
      $PMconsume = $_POST["pmconsume"];
      
      
      
      $sql="SELECT * FROM plan WHERE PlanID='".$id."'";
      $result=mysqli_query($link,$sql);
      $row=mysqli_fetch_assoc($result);
      $FID=$row['PlanFID'];
     
      
      $sql="SELECT * FROM process WHERE PFID='".$FID."' AND Porder='".$order."'";
      $result=mysqli_query($link,$sql);
      $row=mysqli_fetch_assoc($result);;
      $MID=$row['PMID'];
      
      $sql="SELECT * FROM material WHERE MID='".$MID."'";
      $result=mysqli_query($link,$sql);
      $row=mysqli_fetch_assoc($result);
      $Mamount=$row['Mamount'];
      $Mamount=$Mamount-$PMconsume;
      
      if($Mamount>=0){
            $sql = "UPDATE distribution SET Fiday='".$Fiday."', PMconsume='".$PMconsume."',Finish='1'  WHERE PlanID='".$id."' AND Planorder='".$order."'";
            mysqli_query($link, $sql);  // 執行SQL指令
            $sql="UPDATE material SET Mamount='".$Mamount."' WHERE MID='".$MID."'";
            mysqli_query($link,$sql);
            header("Location:planP.php"); // 轉址
      }
      else{
        echo "庫存不足!!";
      }
       
    }
   
require_once("mycontacts_close.inc");
?>


</body>
</html>