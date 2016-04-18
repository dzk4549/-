

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid" style="margin-left: 40px">
    <div class="row-fluid"><button data-toggle="modal" data-target="#mymodal" class="btn btn-danger btn-large fr"><i class="icon-plus"></i>添加仓库</button></div>
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> <span class="label label-important">1</span> 仓库A </a> </li>
        <li class="bg_lg span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A</a> </li>
        <li class="bg_ly span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A </a> </li>
        <li class="bg_lo span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A</a> </li>
        <li class="bg_ls span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A</a> </li>
        <li class="bg_lo span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A</a> </li>
        <li class="bg_ls span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A</a> </li>
        <li class="bg_lb span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A</a> </li>
        <li class="bg_lg span3" style="height: 100px"> <a href="index.php?r=smanagement/Warehouse"> <i class="icon-home"></i> 仓库A</a> </li>
      </ul>
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
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">
            </div>
          </div>
        </div>
      </div>
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

<!--end-main-container-part-->

