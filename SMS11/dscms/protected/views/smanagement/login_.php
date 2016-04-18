<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>仓库管理系统</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- mine css -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sms.css" media="screen, projection" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">.col-md-4</div>
        </div>
        <div class="row">
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4">.col-md-4</div>
        </div>
        <div class="row">
            <div class="col-md-3">.col-md-3</div>
            <div class="col-md-6">.col-md-6</div>
            <div class="col-md-3">.col-md-3</div>
        </div>
        <form>
            <fieldset>
                <legend>login</legend>
                <label>账户</label>
                <input type="text" placeholder="请输入...">
                <label>密码</label>
                <input type="text" placeholder="请输入...">
                <span class="help-block">Example block-level help text here.</span>
                <label class="checkbox">
                    <input type="checkbox"> Check me out
                </label>
                <button type="submit" class="btn">登陆</button>
            </fieldset>
        </form>
    </div>
<!-- 如果要使用Bootstrap的js插件，必须先调入jQuery -->
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
<!-- 包括所有bootstrap的js插件或者可以根据需要使用的js插件调用　-->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
