<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>出貨</title>
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

$sql = "SELECT * FROM ship ORDER BY Shdate desc";
// 執行SQL查詢
$result = mysqli_query($link, $sql);

$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<th>花編號</th><th>出貨日期</th><th>市場</th><th>箱號</th><th>等級</th><th>出貨量</th><th>底價</th><th>核對</th><th>計畫編號</th></tr>";
$j = 1;
$check="";
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
        
        $sq = "SELECT PlanFID FROM plan WHERE PlanID='".$rows[7]."'";
        $resul = mysqli_query($link, $sq); // 執行SQL指令
        $ro = mysqli_fetch_assoc($resul); // 取回記錄
        $FID=$ro['PlanFID'];
        echo "<tr>";
        echo "<td>".$FID."</td>";
        
        $k=0;
        for ( $i = 0; $i<= $total_fields-1; $i++ ){
        
            if($i==5 && $rows[5]==0){
                 $s_array = array('submit',$k);
                 $c=implode( $s_array);
                 echo "<form name=".$c." action='ship_update.php?action=price&date=".$rows[0]."&market=".$rows[1]."&boxid=".$rows[2]."&grade=".$rows[3]."&id=".$rows[7]." ' method='post'>";
                 echo "<td><input type='text' name='shprice' size='5' maxlength='10' value='0'/></td>";
                 echo "<td><colspan='1' align='center'> <input type='submit' name=".$c." value='底價'/></td></form>";
                 $k++;
            }
            if($i!=6 && $i!=5)
                    echo "<td>".$rows[$i]."</td>";
            if($i==5 && $rows[5]!=0)
                   echo "<td>".$rows[$i]."</td>";
                   
            if($i==6 && $rows[6]==0 && $rows[5]!=0)
                   echo "<td><a href='ship_update.php?action=check&date=".$rows[0]." &market=".$rows[1]."&boxid=".$rows[2]."&grade=".$rows[3]."&id=".$rows[7]." '><b>核對</b>  ";
            if($i==6 && $rows[6]!=0 )
                echo "<td>已核對</td>";
            }
            
  
   echo "</td>";
   echo "</tr>";
   $j++;

   }
 
   

echo "</table><br>";
if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='shipA.php?Pages=".($pages-1).
        "'>上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"shipA.php?Pages=".$i."\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='shipA.php?Pages=".($pages+1).
        "'>下一頁</a> ";
mysqli_free_result($result);  // 釋放佔用的記憶體
require_once("mycontacts_close.inc");
?>
<br/>
<p class="w3-center">
 <a href="administractor.php#ship" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回上頁</a></p>
</body>
</html>