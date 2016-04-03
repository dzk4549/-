<!DOCTYPE html>
<html lang="zh-cn">

<head>
	<meta charset="utf-8">
	<title>仓库管理系统</title>

<style type="text/css">
body{background-color: #804000;}
.login{margin-top:180px;}
.form-group{margin-bottom: 10px;}
.text{text-align: center;color:#CCC;}
</style>

</head>

<body>
	<div class="container">
		<p class="text"><span style="font-size:100px"><strong>仓库管理系统</strong></span></p>
		
      <div class="login">
      	
        <div class="login-screen">
          <center>
          <form class="login-form" method="post" action="index.php?r=Smanagement/LogintoSMS">

            <div class="form-group">
               <div class="form-group">
              
              <strong>账户：</strong><input type="text" class="form-control login-field" placeholder="账户" id="SID" name="SID"/>
              
            </div>
              <strong>密码：</strong><input type="password" class="form-control login-field" placeholder="密码" id="password" name="password"/>

            </div>
           

           
            <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" data-role="button" value="登陆">
          </form>
      </center>
        </div>
      </div>
  </div>
	 <script src="./js/jquery.min.js"></script>
    <script src="./js/video.js"></script>
    <script src="./js/flat-ui.min.js"></script>
    <script src="./js/application.js"></script>
</body>
</html>