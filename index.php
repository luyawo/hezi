<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(0);
$rd = rand(10000,50000);
$file = fopen("http://aabbccdd.yes1.cn/ok.txt", "r");
$uu=array();
$i=0;
//输出文本中所有的行，直到文件结束为止。
while(! feof($file))
{
 $uu[$i]= fgets($file);
 //fgets()函数从文件指针中读取一行
 $i++;
}
fclose($file);
$xzurl = trim($uu[8]);
$urll = trim($uu[0]).$rd;
//生成随机IP
function Rand_IP(){
    $ip1id= round(rand(600000, 2550000) / 10000); 
    $ip2id= round(rand(600000, 2550000) / 10000); 
    $ip3id= round(rand(600000, 2550000) / 10000);
    $ip4id= round(rand(600000, 2550000) / 10000);

     return $ip1id.".".$ip2id.".".$ip3id.".".$ip4id;
 }

$curl=curl_init();
$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36";
//模拟windows用户正常访问
curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
//随机IP访问
curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'.Rand_IP(), 'CLIENT-IP:'.Rand_IP()));
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_URL, $urll);
//如果你想把一个头包含在输出中，设置这个选项为一个非零值
curl_setopt($curl, CURLOPT_HEADER, 0);
// 执行之后不直接打印出来
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   
// 获取状态码
$ztm = curl_getinfo($curl,CURLINFO_HTTP_CODE);          
//3.执行并获取结果
$resault=curl_exec($curl);
//释放CURL
curl_close($curl);

function str_substr($start, $end, $str) // 字符串截取函数      
{      
    $temp = explode($start, $str, 2);      
    $content = explode($end, $temp[1], 2);      
    return $content[0];      
}   

$name = str_substr('<h1>', '</h1>', $resault);
$url = str_substr('<source src="', '" type="video/mp4" label="360p" res="360" />', $resault); 
$zjt = str_substr('<source src="http://', '.'.trim($uu[7]), $resault); ;

if ($ztm = 200) {
    $i = 1;
    while ($i >= 2) {
        header("Location:index.php");
        $i++;
    }
}else{

    die(估计是源站出了问题，请等待修复。);
}


switch ($zjt)
{
case trim($uu[5]):
    $zurl = str_replace(trim($uu[3]),trim($uu[1]),$url);
    break;
case trim($uu[6]):
    $zurl = str_replace(trim($uu[4]),trim($uu[2]),$url);
    break;
default:
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<title>神秘的东西</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/willesPlay.css"/>
<script src="js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/willesPlay.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="willesPlay">
    <div class="playHeader">
        <div class="videoName"><?php echo $name; ?></div>
    </div>
    <div class="playContent">
        <div class="turnoff">

        </div>
        <video width="100%" height="100%" id="playVideo">
            <source src="<?php echo $zurl ?>" type="video/mp4"></source>
            当前浏览器不支持 video直接播放.
        </video>
        <div class="playTip glyphicon glyphicon-play"></div>
    </div>
    <div class="playControll">
        <div class="playPause playIcon"></div>
        <div class="timebar">
            <span class="currentTime">0:00:00</span>
            <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            <span class="duration">0:00:00</span>
        </div>
        <div class="otherControl">
            <span class="volume glyphicon glyphicon-volume-down"></span>
            <span class="fullScreen glyphicon glyphicon-fullscreen"></span>
            <div class="volumeBar">
                    <div class="volumewrap">
                        <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 8px;height: 40%;"></div>
                    </div>
                        </div>
                </div>
        </div>
    </div>
</div>
            <center> 一直卡住了？请手动刷新<br><?php 
    echo $xzurl;
 ?> </center><br><br>
        </div>
    </div>
</div>

</body>
</html>