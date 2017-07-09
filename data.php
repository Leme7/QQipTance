<div data-page="data" class="page">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="index.html" class="back link icon-only">
                    <i class="icon icon-back"></i>
                </a>
            </div>
            <div>QQIP探测</div></div>
    </div>
    <div class="page-content ">
        <div class="list-block media-list">
            <ul>

<?php
include(dirname(__FILE__).'/lib/function.php');
include(dirname(__FILE__).'/lib/sqlite.class.php');
$token=isset($_GET['token'])?$_GET['token']:'false';
$DB=new DB(dirname(__FILE__).'/sqlite/qqiptance.db');
$query=$DB->get_row("SELECT * FROM `qqiptance_data` WHERE `token`='$token' LIMIT 1");
//print_r($query);
$d=substr($query['data'],0,-1);
$data=json_decode("[$d]",true);

if($token==$query['token']){
$i = 0;
foreach($data as $value){?>
                <li class="swipeout">
                    <div class="swipeout-content">
                        <a id="copy" class="item-link item-content" data-clipboard-text="<?php echo $data[$i]["ip"];  ?>">
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title"><?php //echo preg_replace("/[^\.]{1,3}$/","***",$data[$i]["ip"]);
                                    echo $data[$i]["ip"];
                                      ?></div>

                                </div>
                                <div class="item-subtitle">
                                <?php if($data[$i]['android'] == true){ ?>
                                    <div class="chip bg-green" onclick="myApp.alert('<?php echo $data[$i]['android_ua'] ?>', 'User-Agent');">
                                        <div class="chip-label">Android</div>
                                    </div>
                                   <?php
                                    }
                                    if($data[$i]['ios'] == true){ ?>
                                    <div class="chip bg-purple" onclick="myApp.alert('<?php echo $data[$i]['ios_ua'] ?>', 'User-Agent');">
                                        <div class="chip-label">iOS</div>
                                    </div>
                                 <?php }
                                 if($data[$i]['pc'] == true){ ?>
                                    <div class="chip bg-blue" onclick="myApp.alert('<?php echo $data[$i]['ua'] ?>', 'User-Agent');">
                                        <div class="chip-label">PC</div>
                                    </div>
                                 <?php }
                                 if($data[$i]['unknown'] == true){ ?>
                                    <div class="chip" onclick="myApp.alert('<?php echo $data[$i]['unknown_ua'] ?>', 'User-Agent');">
                                        <div class="chip-label">未知</div>
                                    </div>
                                 <?php } ?>
                            </div>
                            </div>
                        </a>
                    </div>
                    <div class="swipeout-actions-right">
                        <a onclick="ipip('<?php echo $data[$i]["ip"]; ?>');" href="javascript:void(0);">查询归属地</a>
                    </div>
                </li>
<?php
    $i++; }}else{ ?>
                    <li class="swipeout">
                    <div class="swipeout-content">
                        <a href="javascript:void(0);" class="item-link item-content">
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title">404 Not Found</div>

                                </div>
                                <div class="item-subtitle">不存在的</div>
                            </div>
                        </a>
                    </div>
                </li>
<?php } ?>
            </ul>
        </div>
    </div>
</div>
