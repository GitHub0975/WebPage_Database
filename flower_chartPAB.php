<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>花卉流程</title>
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
    text-align: left;
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
<center>
<?php
session_start();  // 啟動交談期
$records_per_page = 10;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
if (isset($_GET["id"])) $FID = $_GET["id"];
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

  $sql = "SELECT * FROM process WHERE PFID='".$FID."'";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr><th style='width:80px'>花編號</th>";
echo "<th>順序</th><th>工作項目</th><th>工作天數</th><th>原料使用量/分</th><th>原料編號</th></tr>";
$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ )
      echo "<td>".$rows[$i]."</td>";
   
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</div>";
echo "</table><br>";
if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='flower_chartPAB.php?Pages=".($pages-1).
        "'>上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"flower_chartPAB.php?Pages=".$i."\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='flower_chartPAB.php?Pages=".($pages+1).
        "'>下一頁</a> ";
mysqli_free_result($result);  // 釋放佔用的記憶體
require_once("mycontacts_close.inc");
$de=$_SESSION["depart"];
if($de==1){
echo "<br/>";
echo "<p class='w3-center'>";
 echo "<a href='plantView.php#flower' class='w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large'>";
 echo "回首頁</a></p>";
 }else if($de==2){
echo "<br/>";
echo "<p class='w3-center'>";
 echo "<a href='administractor.php#flower' class='w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large'>";
 echo "回首頁</a></p>";
 }else if($de==3){
echo "<br/>";
echo "<p class='w3-center'>";
 echo "<a href='businessView.php#flower' class='w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large'>";
 echo "回首頁</a></p>";
 }
?>

</body>
</html>