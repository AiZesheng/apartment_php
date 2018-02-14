<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>网上银行用户界面</title>
    <!--<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/regist.css">-->
    <style>
        *{
            margin: 0;
            padding:0;
            font: normal 12px/1.6em Microsoft YaHei,Tahoma,simsun;
        }
        ul{
            list-style: none;
        }
        a{
            text-decoration: none;
            color: #000;
        }
        #header{
            width: 100%;
            height: 50px;
            background: #eee;
        }
        #header #choose{
            width: 1300px;
            height: 50px;
            margin: 0 auto;
            background: #eeeeee;
        }
        #header .language{
            width: 100px;
            height: 50px;
            float: left;
            text-align: center;
            line-height: 50px;
        }
        #header #choose a:hover{
            color: orange;
        }
        #header #choose p{
            width: 100px;
            height: 18px;
            float: right;
            text-align: center;
            line-height: 18px;
            margin-right: 100px;
            margin-top: 16px;
            background: url(qqq/1.png) no-repeat;
        }
        #logo{
            width: 1300px;
            height: 100px;
            /*background: red;*/
            margin: 0 auto;
        }
        #logo #l-left img{
            width: 150px;
            height: 100px;
            float: left;
        }
        #logo #l-left h2{
            float: left;
            width: 300px;
            height: 100px;
            font-size: 42px;
            text-align: center;
            line-height: 100px;
            color: #00ab88;
        }
        #logo #l-left #l-left1{
            float: right;
            margin-right: 100px;
            font-size: 18px;
            height: 100px;
            text-align: center;
            line-height: 100px;
            width: 300px;
        }
        #mid{
            width: 1300px;
            height: 400px;
            margin: 30px auto;
            border-top: 3px solid #00ab88;
        }
        #mid h2{
            width: 300px;
            height: 70px;
            line-height: 70px;
            font-size: 20px;
            color: #00ab88;
        }
        #mid .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        #mid li div{
            float: left;
            width: 20%;
            height: 50px;
            line-height: 50px;
            border-bottom: 1px solid #aaa;
        }
        /************footer开始************/
        #footer{
            height: 450px;
            background: #202020;
        }
        #footer-top{
            height: 280px;
            width: 1200px;
            margin: 0 auto;
            border-bottom: 1px solid;
        }
        #footer-left{
            width: 400px;
            height: 276px;
            float: left;
        }
        #footer-left h2{
            font-size: 20px;
            color: gray;
        }
        #footer-left a{
            font-size: 13px;
            color: #fff;
            width: 180px;
            height: 30px;
            display: block;
            margin-top: 10px;
        }
        #footer-left1{
            margin-top: 35px;
            float: left;
        }
        #footer-left2{
            margin-top: 35px;
            float: right;
        }
        #footer-right{
            width: 800px;
            height: 267px;
            float: right;
        }
        #footer-right li{
            margin-top: 40px;
            margin-left: 30px;
            float: left;
            width: 140px;
            height: 184px;
        }
        #footer-right img{
            width: 115px;
            height: 115px;
            margin-left: 250px;
        }
        #footer-right a,p{
            width: 135px;
            height: 36px;
            display: block;
            font-size: 13px;
            text-align: center;
            line-height: 36px;
            color: gray;
            margin-left: 240px;
        }
        #footer-right #sj{
            width: 30px;
            height: 30px;
            background: url(qqq/footer0.png) no-repeat  -0px -0px;
            margin-left: 290px;
        }
        #footer-right #wx{
            width: 30px;
            height: 30px;
            background: url(qqq/footer0.png) no-repeat  -35px -0px;
            margin-left: 290px;
        }
        #footer-right #wb{
            width: 30px;
            height: 30px;
            background: url(qqq/footer0.png) no-repeat  -74px -0px;
            margin-left: 290px;
        }
        #footer-down{
            height: 153px;
        }
        #footer-down li{
            float: left;
            margin-top: 50px;
        }
        #fleft1 img{
            width: 116px;
            height: 48px;
        }
        .fright1 p{
            width: 509px;
            height: 22px;
            font-size: 12px;
            color: gray;
            /* 	float: left;*/
        }
        .fright1 a{
            color: gray;
        }
        .fright1 a:hover{
            color: #33CCCC;
        }
        /************footer结束************/
    </style>
</head>
<body>
<div id="header">
    <div id="choose">
        <ul>
            <li class="language"><a href="">简体中文</a></li>
            <li class="language"><a href="">繁体中文</a></li>
            <li class="language"><a href="">English</a></li>
        </ul>
        <p><a href="">全球服务</a></p>
    </div>
</div>
<div id="logo">
    <div id="l-left"><a href="#"><img src="qqq/logo1.png" alt="Logo"/></a>
        <h2>网上银行</h2>
        <p id="l-left1">客服电话：90909不0</p>
    </div>
</div>
<div id="mid">
    <div class="wrapper">
        <h2>账户明细</h2>
        <ul>
            <li>
                <div class="date">交易日期</div>
                <div class="pay">收入/支出</div>
                <div class="money">交易金额</div>
                <div class="success">交易状态</div>
                <div class="balance">交易后余额</div>
            </li>
        </ul>
        <ul ng-app="myApp" ng-controller="myCtrl">
        	<?php var_dump($key) ?>
        	<?php foreach($key as $val){ ?>
	            <li>
	                <div class="date"><?php echo $val->date; ?></div>
	                <div class="pay"><?php echo $val->pay; ?></div>
	                <div class="money"><?php echo $val->money; ?></div>
	                <div class="success">交易成功</div>
	                <div class="balance"><?php echo $val->balance; ?></div>
	            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div id="footer">
    <div id="footer-top">
        <div id="footer-left">
            <div id="footer-left1">
                <h2>银行帮助</h2>
                <ul>
                    <li><a href="#">安卓 APP下载</a></li>
                    <li><a href="#">IOS APP下载</a></li>
                    <li><a href="#">APP助手使用教程</a></li>
                    <li><a href="#">网上银行软件教程</a></li>
                </ul>
            </div>
            <div id="footer-left2">
                <h2>使用规则</h2>
                <ul>
                    <li><a href="#">用户行为准则</a></li>
                    <li><a href="#">不良信息投诉举报</a></li>
                    <li><a href="#">版权声明及投诉流程</a></li>
                    <li><a href="#">内容管理及处置条例</a></li>
                </ul>
            </div>
        </div>
        <div id="footer-right">
            <ul>
                <li><div id="sj"></div><img src="qqq/footer1.png" alt="">
                    <p>手机版</p>
                </li>
                <li><div id="wx"></div><img src="qqq/footer2.png" alt="">
                    <p>微信：关羽</p>
                </li>
                <li><div id="wb"></div><img src="qqq/footer3.png" alt="">
                    <a href="#">网上银行官方微博</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="footer-down">
        <ul>
            <li id="fleft1"><p><img src="qqq/logo2.png" alt=""></p></li>
            <li class="fright1"><p>啧ICP备00000000号 | <a href="#">啧网文[2016]1111-C17号 </a>| <a href="#">啧公网安备 6666666666666号</a></p></li>
            <li class="fright1"><p>哈尔滨熊猫网上银行 | 地址: 黑龙江大学 | 客服电话：90909不0</p></li>
        </ul>
    </div>
</div>
<script src="../js/angular-1.2.18/angular.min.js"></script>
<script>
    (function(){
        var loginUser = JSON.parse(sessionStorage.loginUser);
        var app = angular.module("myApp", []);
        app.controller("myCtrl", function($http, $scope){
            $http({
                url : "http://127.0.0.1/IBS_php/user/details",
                method : "GET",
                params : {
                    card : loginUser.card
                }
            }).success(function(data){
                $scope.data = data;
            });
        });
    })();
</script>
</body>
</html>