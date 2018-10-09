<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>計畫編輯</title>
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

$action = $_GET["action"];  // 取得操作種類
require_once("mycontacts_open.inc");
// 執行操作
switch ($action) {
   case "update": // 更新操作    
      $PlanFID = $_POST["planfid"]; // 取得欄位資料
      $PlanLID = $_POST["planlid"];
      $Start=$_POST["exday"];
      $sql = "UPDATE plan SET PlanFID='".$PlanFID.
             "', PlanLID='".$PlanLID."'  WHERE PlanID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      $sql="DELETE FROM distribution WHERE PlanID='".$id."'";
      mysqli_query($link, $sql); // 執行SQL指令
      
      
      $sql= "SELECT Porder,Pday FROM process WHERE PFID='".$PlanFID."'";
     $result = mysqli_query($link, $sql);
   
$j = 0;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $order[$j]=$rows[0];
    $day[$j]=$rows[1];
    $j=$j+1;
    
 }
   
   for ( $i = 0; $i< $j; $i++ ){
    $sql = "INSERT INTO distribution (PlanID, Planorder,Exday,Finish) VALUES('".$id."', '".$order[$i]."','".$Start."','0')"; 
   
      if ( mysqli_query($link, $sql) )  // 執行SQL指令
         echo "<center><span style='font-family:Microsoft JhengHei; font-weight:bold;'>新增成功!</span><br/>";
      else
        echo "新增失敗";
     
    $s_array = array('+',$day[$i],' days');
    $c=implode( $s_array);
    $a=strtotime($Start);
    $Start=date('Y-m-d', strtotime($c, $a)); //單位秒
    }
      header("Location:planM.php"); // 轉址
      break;
   case "del":    // 刪除操作
      $sql = "DELETE FROM plan WHERE PlanID='".$id."'";
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location:managerView.php#plan"); // 轉址
      break;
   case "edit":   // 編輯操作
      $sql = "SELECT plan.*,distribution.Planorder,distribution.Exday FROM plan INNER JOIN distribution ON plan.PlanID=distribution.PlanID";
      
      $result = mysqli_query($link, $sql); // 執行SQL指令
      while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        if ($row[0]==$id){
        $PlanFID = $row[1]; // 取得欄位name
        $PlanLID = $row[2];  
        $Exday = $row[4];}
        }
// 顯示編輯表單
?>
<center>
<form action="plan_edit.php?action=update&planid=<?php echo $id ?>"
      method="post">
<div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">編輯計畫<?php echo $id ?></th></tr>
<tr><td>計畫編號: </td><td><?php echo $id ?></td>
   </tr>
<tr><td>花編號: </td>
   <td><input type="text" name="planfid" size="20" 
   maxlength="10" value="<?php echo $PlanFID ?>"/></td></tr>
<tr><td> 土地編號: </td>
   <td><input type="text" name="planlid" size="20"
   maxlength="20" value="<?php echo $PlanLID ?>"/></td></tr>
<tr><td>耕土日期:</td>
   <td><input type="date" name="exday" size="20"
   maxlength="20" value="<?php echo $Exday ?>"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="更新"/></td></tr>
</table>
</form>
<br/>
 <p class="w3-center">
 <a href="managerView.php#plan" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
<?php   
       break;
} 
require_once("mycontacts_close.inc");
?>
</body>
</html>