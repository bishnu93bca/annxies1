<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo SITE_NAME;?> :: Admin Console</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="<?php echo $SITE_LOC_PATH;?>/templates/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <script src="js/libs/modernizr-2.0.min.js"></script>
    <script src="js/libs/respond.min.js"></script>
    <style type="text/css">
	body{
		background:#2579b3;
	}
	.mp3_song{
		visibility:hidden;
	}
	#container{
		text-align:center;
	}
	#main{
		margin:0 auto;
	}
	</style>
</head>
<body>
<div id="container">
    <?php 
	if($action=='forgot-password') 
		include("forgot-password.php");
	else
	{
        ?>
        <div role="main" id="login_main">
            <div id="welcome">
                <p>Welcome to Admin</p>
                <div id="login">
                    <div>Please Login</div>
                    <form name="login" method="post" action="index.php">
                        
                        <?php if($_SESSION['PROTECT']<=10) {?>
                        <div id="form">
                            <label>User Name</label>
                            <input type="text" name="LoginName" placeholder="Type User Name Here..." autocomplete="off">
                            <label>Password</label>
                            <input type="password" name="LoginPass" placeholder="******" autocomplete="off">
                        </div>
                        <input type="submit" value="Login" name="CheckLogin" class="login_btn">
                        <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
                        <?php }?>
                        <a href="index.php?action=forgot-password">Forgot Password!</a>
                        <span class="warning_login">
                            <?php if($ErrMsg) echo $ErrMsg;?>
                        </span>
                    </form>
                </div>
            <!--end of the login--> 
            </div>
            <!--end of the welcome-->     
        </div>
        <?php 
    }?>
    <footer></footer>	
</div>
<!--! end of #container -->
<?php /*<div id="voice" style="display:none;">Welcome to our Project Management Console.</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script> 
<script type="text/javascript">
	$(function(){
		var name = $("#voice").text();
		var src = "http://translate.google.com/translate_tts?tl=en&q=" + name ;
		$('body').append("<iframe id='ifrm'>").find("#ifrm").attr("src", src).css("visibility", "hidden");
	});
</script>*/?>
<script src="js/script.js"></script> 
<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->	
</body>
</html>