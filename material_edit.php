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

</head>
<body style="font-family:DFKai-sb; background-image:url(bbb.jpg); ">
<?php
$id = $_GET["id"];  // 取得URL參數的編號
$action = $_GET["action"];  // 取得操作種類
require_once("mycontacts_open.inc");
// 執行操作
if($action=="del") {
      $sql="SELECT PMID FROM process WHERE PMID='".$id."'";
      $result=mysqli_query($link,$sql);
      $total_rows=mysqli_num_rows($result);
      if($total_rows==0){
        $sql = "DELETE FROM material WHERE MID='".$id."'";
        mysqli_query($link, $sql);  // 執行SQL指令
        header("Location:managerView.php#material"); // 轉址
        require_once("mycontacts_close.inc");
   }
   else{
        echo "<center><h2><span style='font-family:DFKai-sb; color:red;'>";
        echo "花卉流程中有項目使用該原料,請重新確認!";
        echo "</h2></span><br/>";
   }
// 顯示編輯表單
}
?>
<br/>
 <p class="w3-center">
 <a href="managerView.php#material" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
</body>
</html>