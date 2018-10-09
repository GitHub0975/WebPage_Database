<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>更新</title>
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
            header("Location:plantView.php#plan"); // 轉址
      }
      else{
        echo "<center><h2><span style='font-family:DFKai-sb; color:red;'>庫存不足!!</span></h2><br/>";
      }
       
    }
   
require_once("mycontacts_close.inc");
?>
<br/>
 <p class="w3-center">
 <a href="plantView.php#plan" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回上頁</a></p>
</body>
</html>