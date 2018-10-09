<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>新增出貨單</title>
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
if(isset($_GET["id"])) $id=$_GET["id"];
if(isset($_GET["amount"])) $amount=$_GET["amount"];
if(isset($_GET["FID"])) $FID=$_GET["FID"];
if(isset($_GET["date"])) $date=$_GET["date"];
if (isset($_POST["shdate"]) && isset($_POST["market"])&& isset($_POST["boxid"])&& isset($_POST["grade"])&& isset($_POST["shamount"]) ) {
   $SHdate = $_POST["shdate"];
   $Market = $_POST["market"];
   $BoxID = $_POST["boxid"];
   $Grade = $_POST["grade"];
   $SHamount = $_POST["shamount"];
   
   // 檢查是否有輸入欄位資料
   if ($SHdate != "" && $Market != "" && $BoxID != "" && $Grade != "" && $SHamount <$amount ) {
      require_once("mycontacts_open.inc");
      // 建立SQL字串
      $sql = "INSERT INTO ship (Shdate, Market,BoxID,Grade,Shamount,ShPlanID) VALUES('";
      $sql.= $SHdate."','".$Market."', '".$BoxID."','".$Grade."','".$SHamount."','".$id."')"; 
      if ( mysqli_query($link, $sql) )  // 執行SQL指令
         echo "<center><span style='font-family:Microsoft JhengHei; font-weight:bold;'></span><br/>";
      $amount=$amount-$SHamount;
      $sql="UPDATE harvest SET Hremain='".$amount."' WHERE Hardate='".$date."' AND HPlanID='".$id."'";
      if ( mysqli_query($link, $sql) ) { // 執行SQL指令
         echo "<center><h2><span style='font-family:DFKai-sb; color:red;'>新增成功!</span></h2><br/>";
 
      }
        // 執行SQL指令
      
      
      require_once("mycontacts_close.inc");
   }
   else {
       echo "<div class='w3-large w3-center' style='color:	#EA0000'>資料有誤!</div>";
  }
}
?>
<center>
<form action="ship_insert.php?id=<?php echo $id ?>&amount=<?php echo $amount?>&FID=<?php echo $FID?>&date=<?php echo $date?>" method="post" 
      enctype="multipart/form-data">
    <div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">新增出貨單</th></tr>

<tr><td>出貨日期:</td>
   <td><input type="date" name="shdate" style="padding:5px;"
              maxlength="10"/></td></tr>
  
<tr><td>市場:</td>
   <td><input type="text" name="market" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>箱號:</td>
   <td><input type="text" name="boxid" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>等級:</td>
   <td><input type="text" name="grade" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>出貨量:</td>
   <td><input type="text" name="shamount" style="padding:5px;"
              maxlength="10"/></td></tr>

<tr><td colspan="2" align="center">
   <input type="submit" value="新增"/>
   </td></tr>
</table>
</form>
</div>
<br/>
 <p class="w3-center">
 <a href="businessView.php#ship" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
</body>
</html>