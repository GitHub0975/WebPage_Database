<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});
</script>
</head>
<body>

<p><?php
session_start();  // 啟動交談期
$records_per_page = 10;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

$sql = "SELECT PlanID FROM distribution WHERE Finish=0 ORDER BY PlanID desc";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_records=0;
$check="";
while ($re = mysqli_fetch_array($result)){
    if($re[0]!=$check)
        $total_records++;
    $check=$re[0];
}
mysqli_data_seek($result, 0);
$total_fields=mysqli_num_fields($result); // 取得欄位數

// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<table class='w3-large' style='font-family:DFKai-sb'>";
echo "<tr><th>計畫編號</th><th>花編號</th><th>可出貨量</th></tr>";
$j = 1;
$check="";
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   if($rows[0]!=$check){
        $sq = "SELECT * FROM harvest WHERE HPlanID='".$rows[0]."' ORDER BY Hardate desc";
        $resul = mysqli_query($link, $sq); // 執行SQL指令
        $ro = mysqli_fetch_assoc($resul); // 取回記錄
        $total=$ro['Hremain'];
        $date=$ro['Hardate'];
        echo "<tr>";
        
        echo "<td>".$rows[0]."</td>";
        $sq = "SELECT PlanFID FROM plan WHERE PlanID='".$rows[0]."'";
        $resul = mysqli_query($link, $sq); // 執行SQL指令
        $ro = mysqli_fetch_assoc($resul); // 取回記錄
        $FID=$ro['PlanFID'];
        echo "<td>".$FID."</td>";
        if($total!="")
            echo"<td>".$total."</td>";
        else{
            echo"<td>0</td>";
        }
   echo "</tr>";
   $j++;
   $check=$rows[0];
   }
 
   
}
echo "</table><br>";
if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='shipM.php?Pages=".($pages-1).
        "'>上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"shipM.php?Pages=".$i."\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='shipM.php?Pages=".($pages+1).
        "'>下一頁</a> ";
mysqli_free_result($result);  // 釋放佔用的記憶體
require_once("mycontacts_close.inc");
?></p>

<button id="hide">Hide</button>
<button id="show">Show</button>

</body>
</html>