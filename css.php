
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="图片轮播，图片切换，焦点图" />
<meta name="description" content="这是一个基于jquery的图片轮播效果演示页" />
<title>演示3：flexslider图片轮播、文字图片相结合滑动切换效果</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<link rel="stylesheet" type="text/css" href="flexslider.css" />
<style type="text/css">
h3{height:42px; line-height:42px; font-size:16px; font-weight:normal; text-align:center}
h3 a{margin:10px}
h3 a.cur{color:#f30}
#main{width:60%}
.slides li p{height:24px; line-height:24px; text-align:center}
</style>
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery.flexslider-min.js"></script>
<script type="text/javascript" src="jquery.easing.min.js"></script>
<script type="text/javascript">
$(function() {
    $(".flexslider").flexslider({
		animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
		minItems: 2,
        maxItems: 4
       // pausePlay: true
	});
});	
</script>
</head>

<body>
<div id="header">
   <div id="logo"><h1><a href="http://www.helloweba.com" title="返回helloweba首页">helloweba</a></h1></div>
   <div class="demo_topad"><script src="/js/ad_js/demo_topad.js" type="text/javascript"></script></div>
</div>

<div id="main">
   <h2 class="top_title"><a href="http://www.helloweba.com/view-blog-265.html">flexslider图片轮播、文字图片相结合滑动切换效果</a></h2>
   
   <h3><a href="index.html">演示1：基本</a> <a href="index2.html">演示2：图文混排</a> <a href="index3.html" class="cur">演示3：多图自适应滑动</a> <a href="index4.html">演示4：带缩略图的相册</a></h3>
   
   		<div class="flexslider carousel">
          <ul class="slides">
            <li><img src="20777.jpg" /><p>图片展示1</p></li>
            <li><img src="20778.jpg" /><p>图片展示2</p></li>
            <li><img src="20779.jpg" /><p>图片展示3</p></li>
            <li><img src="20781.jpg" /><p>图片展示4</p></li>
            <li><img src="20782.jpg" /><p>图片展示5</p></li>
            <li><img src="20783.jpg" /><p>图片展示6</p></li>
            <li><img src="20780.jpg" /><p>图片展示7</p></li>
            <li><img src="20784.jpg" /><p>图片展示8</p></li>
            <li><img src="20786.jpg" /><p>图片展示9</p></li>
            <li><img src="20787.jpg" /><p>图片展示10</p></li>
            <li><img src="20789.jpg" /><p>图片展示11</p></li>
            <li><img src="20794.jpg" /><p>图片展示12</p></li>
          </ul>
     	</div>

   <div class="ad_76090"><script src="/js/ad_js/bd_76090.js" type="text/javascript"></script></div><br>
</div>
<div id="footer">
    <p>Powered by helloweba.com  允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>
</div>

<p id="stat"><script type="text/javascript" src="/js/tongji.js"></script></p>
</body>
</html>
