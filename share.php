<?php
include(dirname(__FILE__).'/lib/function.php');
include(dirname(__FILE__).'/lib/sqlite.class.php');
error_reporting(0);
//header("Content-Type: text/json;Charset=UTF-8");

$ip = real_ip();
$ua = $_SERVER['HTTP_USER_AGENT'];

if($ua == 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)' || $ua='Apache-HttpClient/UNAVAILABLE (java 1.4)' || $ua='Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0'){
    $pc = true;
}elseif(preg_match('/Darwin/',$ua)){
    $ios = true;
    $ios_ua = $ua;
}elseif($ua == '' || preg_match('/Dalvik\//',$ua)){
    $android = true;
    $android_ua = $ua;
}elseif($ua == 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_4 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12H143 Safari/600.1.4'){
    die();
}elseif($ua == 'Java/1.6.0_21'){
    die();
}else{
    $unknown = true;
    $unknown_ua = $ua;
}

$_T=isset($_GET['_T'])?$_GET['_T']:false;
$_U=isset($_GET['_U'])?$_GET['_U']:false;

if($_T && $_U){
	$token=base64_decode(urldecode($_T));
	$img_url=base64_decode(urldecode($_U));
	$DB=new DB(dirname(__FILE__).'/sqlite/qqiptance.db');
	$query=$DB->get_row("SELECT * FROM `qqiptance_data` WHERE `token`='$token' LIMIT 1");
	//print_r($query);
	$time=time();
	$delete_time=$time+(31*24*60*60);
	$data=<<<DATA
{"pc":"$pc","android":"$android","android_ua":"$android_ua","ios":"$ios","ios_ua":"$ios_ua","unknown":"$unknown","unknown_ua":"$unknown_ua","ip":"$ip","ua":"$ua","time":"$time"},
DATA;

	if($query['token']==$token){//存在
		$d=substr($query['data'],0,-1);
		$d=json_decode("[$d]",true);
		//print_r($d);

		foreach($d as $key=>$value){
				$ikey=array_search($ip,$value);
				if($ikey){
					$find=true;
					break;
				}else{
					$find=false;
				}
		}

		if($find==false){
			$ud=$query['data'].$data;
			$update="UPDATE `qqiptance_data` SET `data`='$ud' WHERE `token`='$token'";

			if($DB->query($update)){
				header("Location: $img_url");
			}else{
				echo 'UPDATE DataBase fail !';
			}

		}else{

			$sql="INSERT INTO `qqiptance_data` (`token`,`userip`,`data`,`addtime`,`editetime`,`delete_time`) VALUES ('$token','$ip','$data','$time','$time','$delete_time')";
			if($DB->query($sql)){
				header("Location: $img_url");
			}else{
				echo 'INSERT DataBase fail !';
			}

		}

	}else{//不存在数据，写入
		$sql="INSERT INTO `qqiptance_data` (`token`,`userip`,`data`,`addtime`,`editetime`,`delete_time`) VALUES ('$token','$ip','$data','$time','$time','$delete_time')";
		if($DB->query($sql)){
			header("Location: $img_url");
		}else{
			echo 'INSERT DataBase fail !';
		}
	}
}else{
	echo 'not data';
}
