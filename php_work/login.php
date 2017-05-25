<!doctype html>
<?php session_start();?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<link rel="shortcut icon" href="img/s-logo.png" >
<script src="js/plugins/jquery-2.0.0.min.js" ></script>
<script src="js/plugins/bootstrap.min.js" ></script>
<script src="js/login.js" ></script>
    
<title>人力资源登录界面</title>
</head>

<body>
	<div class="container-fluid">
    
    <button type="button" class="btn btn-danger btn-block" data-container="body" data-toggle="popover" data-placement="bottom" style="display:none;position:fixed" id="wrong">用户名或密码错误</button>
    
	<div class="row-fluid" style="padding-top:50px">
		<div class="col-md-2 col-md-offset-2">
			<img alt="150x150" src="img/b-logo.png" width="100" height="100"
            	/>
		</div>
		<div class="col-md-5">
			<h1 class="text-center" style="font-size:40px;text-align:center" >
				山东省人力资源管理系统
			</h1>
		</div>
		<div class="col-md-2">
		</div>
	</div>
    </div>
    
    <div class="container" style="margin-top: 30px;padding-top:20px">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="tabbable" id="tabs-926423">
				<ul class="nav nav-tabs text-center">
					<li class="active">
						<a data-toggle="tab" name="1" href="#panel-794456" onClick="change(this)">企业用户</a>
					</li>
					<li>
						<a data-toggle="tab" name="2" href="#panel-775158" onClick="change(this)">市用户</a>
					</li>
					<li>
						<a data-toggle="tab" name="3" href="#panel-794455" onClick="change(this)">省用户</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
    	<div class="row">
           	<form>
                <div class="form-group">
        			<div class="col-md-4 col-md-offset-4" style="margin-top:20px">
                    	<input type="text" class="form-control" placeholder="账号" id="account">
                    </div>
                </div>
                
                <div class="form-group">
        			<div class="col-md-4 col-md-offset-4" style="margin-top:20px">
                    	<input type="password" class="form-control" placeholder="密码" id="password">
                    </div>
                </div>
                
                <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <button type="button" class="btn btn-success btn-block" id="login" onClick="loginIt()">登陆</button>
                </div>

            </form>
        </div>
	</div>
    
    
</body>
</html>