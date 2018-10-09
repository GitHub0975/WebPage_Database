<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>土地</title>
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
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

$sql = "SELECT * FROM land";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<th>土地編號</th><th>土地名</th><th>面積/分</th><th>狀況</th><th></th></tr>";
$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ ){
      if($rows[3]==0 && $i==3){
        echo "<td>栽種中</td>";continue;}
      else if($rows[3]==1 && $i==3){
        echo "<td>採收中</td>";continue;}
      else if($rows[3]==2 && $i==3){
        echo "<td>休耕中</td>";continue;}
      echo "<td>".$rows[$i]."</td>";
      }
     
      echo "<td><a href='land_edit.php?action=edit&id=";
      echo $rows[0]."'><b>編輯</b> | ";
      echo "<a href='land_edit.php?action=del&id=";
      echo $rows[0]."'><b>刪除</b></td>";
      echo "</tr>";
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</table><br>";
if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='landM.php?Pages=".($pages-1).
        "'>上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"landM.php?Pages=".$i."\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='landM.php?Pages=".($pages+1).
        "'>下一頁</a> ";
mysqli_free_result($result);  // 釋放佔用的記憶體
require_once("mycontacts_close.inc");
?>
<br/>
<p class="w3-center">
 <a href="managerView.php#land" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回上頁</a></p>
</body>
</html>