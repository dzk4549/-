<!DOCTYPE html>
<html lang="en">
<head>
    <title>仓库管理系统</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery.gritter.css" />
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">仓库管理系统</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">你好，<?php echo $staff[0]['SName']; ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">消息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
        <li class=""><a title="" href="index.php?r=smanagement/Login"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="搜索..."/>
    <button type="submit" class="tip-bottom" title="点击搜索"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li><a href="index.php?r=smanagement/Index"><i class="icon icon-home"></i><span>仓库管理</span></a> </li>
        <li><a href="index.php?r=smanagement/Goods"><i class="icon icon-lemon"></i> <span>货物管理</span></a> </li>
        <li class="active"><a href="index.php?r=smanagement/Employee"><i class="icon icon-group"></i> <span>员工管理</span></a> </li>
        <li class="submenu"><a href="#"><i class="icon icon-truck"></i> <span>进出货管理</span></a>
            <ul>
                <li><a href="index.php?r=smanagement/Goodsin">进货</a></li>
                <li><a href="index.php?r=smanagement/Goodsout">出货</a></li>
            </ul>
        </li>
        <li><a href="index.php?r=smanagement/purchase"><i class="icon icon-shopping-cart"></i> <span>采购管理</span></a></li>
        <li><a href="index.php?r=smanagement/log"><i class="icon icon-list-alt"></i> <span>操作日志管理</span></a></li>
        <li class="submenu"><a href="#"><i class="icon icon-signal"></i> <span>分析与统计</span> <span class="label label-important">3</span></a></li>
    </ul>
</div>
<!--sidebar-menu-->


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="current">员工管理</a></div>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
        <div class="row-fluid"><button data-toggle="modal" data-target="#mymodal" class="btn btn-danger btn-large fr"><i class="icon-plus"></i>添加员工</button></div>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>员工总览</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>年龄</th>
                            <th>所属仓库</th>
                            <th>权限</th>
                            <th>职位</th>
                            <th>电话</th>
                            <th>身份证号</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="gradeX">
                            <td>0001</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeC">
                            <td>0002</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0003</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0004</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0005</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0006</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0007</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0008</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0009</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0010</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0011</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0012</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0013</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0014</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0015</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        <tr class="gradeA">
                            <td>0016</td>
                            <td>某某</td>
                            <td>男</td>
                            <td class="center">26</td>
                            <td class="center">仓库A</td>
                            <td class="center">分仓库管理员</td>
                            <td class="center">仓库管理员</td>
                            <td>15000000000</td>
                            <td>131002198702121111</td>
                            <td class="center"><a href="#" class="btn btn-primary btn-mini">修改</a> <a href="#" class="btn btn-danger btn-mini">删除</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End-Action boxes-->
    </div>
</div>

<!-- 模态弹出窗 -->
<div class="modal fade" id="mymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">填写新仓库信息</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="get" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">仓库名 :</label>
                        <div class="controls">
                            <input type="text" class="span4" placeholder="First name" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">仓库主管 :</label>
                        <div class="controls">
                            <select>
                                <option>张三</option>
                                <option>李四</option>
                                <option>董泽坤</option>
                                <option>李雪宁</option>
                                <option>啊啊啊</option>
                                <option>Sixth option</option>
                                <option>Seventh option</option>
                                <option>Eighth option</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">仓库地址 :</label>
                        <div class="controls">
                            <input type="password"  class="span4" placeholder="Enter Password"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">仓库备注 :</label>
                        <div class="controls">
                            <textarea class="span4" ></textarea>
                        </div>
                    </div>
                    <!--            <div class="form-actions">-->
                    <!--              <button type="submit" class="btn btn-success">Save</button>-->
                    <!--            </div>-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/matrix.js"></script>
<!--<script src="js/matrix.dashboard.js"></script>-->
<script src="js/jquery.gritter.min.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/matrix.chat.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/matrix.form_validation.js"></script>
<script src="js/jquery.wizard.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.popover.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.tables.js"></script>
<script src="js/mineM.js"></script>
</body>
</html>