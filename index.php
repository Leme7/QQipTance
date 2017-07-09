<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="theme-color" content="#2196f3" />
        <title>QQIP探测</title>
        <link href="https://cdn.bootcss.com/framework7/1.6.4/css/framework7.material.min.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/framework7/1.6.4/css/framework7.material.colors.min.css" rel="stylesheet">
        <link href="https://fonts.proxy.ustclug.org/css?family=Roboto:400,300,500,700" rel="stylesheet">
        <link href="https://fonts.proxy.ustclug.org/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="index.css?ver=9.1" />
        <?php if(isset($_GET['statusBarHeight'])){ ?>
        <style>.statusbar-overlay{height:<?php echo $_GET['statusBarHeight']; ?>px;}.page{border-top:<?php echo $_GET['statusBarHeight']; ?>px solid #2196f3}.panel-left .list-block {margin:<?php echo $_GET['statusBarHeight']+2; ?>px 0;}</style>
        <?php } ?>
    </head>
            <body>
                <div class="statusbar-overlay"></div>
                <div class="panel-overlay"></div>
                <div class="panel panel-left panel-cover">
                    <div class="view">
                        <div class="pages">
                            <div class="page-content page-panel-left">
                                <div class="list-block">
                                    <ul>
                                        <li>
                                            <a href="./usage.html" class="item-link item-content close-panel">
                                                <div class="item-media">
                                                    <i class="material-icons">help_outline</i></div>
                                                <div class="item-inner">
                                                    <div class="item-title">食用方法</div></div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="./about.html" class="item-link item-content close-panel">
                                                <div class="item-media">
                                                    <i class="material-icons">info_outline</i></div>
                                                <div class="item-inner">
                                                    <div class="item-title">关于</div></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="views">
                    <div class="view view-main">
                        <div class="pages navbar-fixed">
                            <div data-page="index" class="page toolbar-fixed">
                                <div class="navbar">
                                    <div class="navbar-inner">
                                        <div class="left">
                                            <a href="#" class="link open-panel icon-only">
                                                <i class="icon icon-bars"></i>
                                            </a>
                                        </div>
                                        <div>QQIP探测</div></div>
                                </div>
                                <div class="toolbar tabbar">
                                    <div class="toolbar-inner">
                                        <a href="#tab-collect" class="active tab-link">收集数据</a>
                                        <a href="#tab-get" class="tab-link">取回数据</a></div>
                                </div>
                                <div class="tabs-animated-wrap">
                                    <div class="tabs">
                                        <div id="tab-collect" class="page-content tab active">
                                            <div class="content-block">
                                                <form id="collect-info-v2" class="list-block inputs-list store-data">
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">跳转链接</div>
                                                            <div class="item-input">
                                                                <input id="url" type="text" value="https://ip.nowtool.cn/tance/" name="url" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '点击消息后转到的网址，必填，否则发送失败。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">图片链接</div>
                                                            <div class="item-input">
                                                                <input id="cover" type="text" value="https://tc.image.52miku.cn/o_1bkj27jrqsvfp816sg1onk4faa.png" name="cover" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '消息上显示的图片.',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">音乐链接</div>
                                                            <div class="item-input">
                                                                <input id="music" type="text" name="music" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '直接在消息上播放音乐，可不填。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">标题</div>
                                                            <div class="item-input">
                                                                <input id="title" type="text" value="苟..." name="title" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '消息上显示的标题。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">概要</div>
                                                            <div class="item-input">
                                                                <input id="summary" type="text" value="岂..." name="summary" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '消息上显示的概要。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">shareid</div>
                                                            <div class="item-input">
                                                                <input id="shareid" type="text" value="1105471055" name="shareid" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '不知道这是什么请勿修改！',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <a id="collect-submit" href="javascript:void(0);" class="button button-raised button-fill color-blue">发送到QQ</a></form>
                                            </div>
                                        </div>
                                        <div id="tab-get" class="page-content tab">
                                            <div class="content-block">
                                                <form class="list-block inputs-list">
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">Token</div>
                                                            <div class="item-input">
                                                                <input id="token" type="text" placeholder="" /></div>
                                                        </div>
                                                    </div>
                                                    <a id="get-submit" href="javascript:void(0);" class="button button-raised button-fill color-blue">取回数据</a></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="https://cdn.bootcss.com/framework7/1.6.4/js/framework7.min.js"></script>
                <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdn.bootcss.com/crypto-js/3.1.9/crypto-js.min.js"></script>
                <script src="https://cdn.bootcss.com/clipboard.js/1.7.1/clipboard.min.js"></script>
                <script type="text/javascript" src="./index.js?ver=11.9"></script>
            </body>

</html>
