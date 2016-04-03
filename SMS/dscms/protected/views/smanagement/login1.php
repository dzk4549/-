
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>仓库——登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sms.css" media="screen, projection" />

    <title>仓库管理系统</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class = "container" id = "login-background">
            <form>
                <fieldset>
                    <legend>login</legend>
                    <label>账户</label>
                    <input type="text" placeholder="请输入...">
                    <label>密码</label>
                    <input type="password" placeholder="请输入...">
                    <span class="help-block">Example block-level help text here.</span>
                    <label class="checkbox">
                        <input type="checkbox"> Check me out
                    </label>
                    <button type="submit" class="btn">登陆</button>
                </fieldset>
            </form>
     </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>