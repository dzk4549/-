/**
 * Created by Administrator on 2016/3/26.
 */

$(function() {
    //登陆
    $('#login_btn').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=smanagement/LogintoSMS",
            data: {
                "SID": $('#sid').val(),
                "password": $('#password').val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    window.location.replace("index.php?r=Smanagement/index");
                }
            }
        })
    });


    /////////////////////////////////仓库/////////////////////////////////
    //新增仓库
    $('#submit_addw').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Warehouse/WAdd",
            data: {
                "WName": $('#wname').val(),
                "WLeader": $('#wleader').val(),
                "WAddress": $('#waddress').val(),
                "WRemarks": $('#wremark').val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！<a href=\"index.php?r=smanagement/Warehouse&Wid= "+data.warehouse_id+"\">点击查看仓库</a></div>";
                    $("#wremarks").after(mess);
                }else{
                    alert('仓库添加失败,请重试');
                }
            }
        })
    });
    //修改仓库
    $('#submit_updatew').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Warehouse/WChange",
            data: {
                "Wid": $('#wid').val(),
                "WName": $('#wname').val(),
                "WLeader": $('#wleader').val(),
                "WAddress": $('#waddress').val(),
                "WRemarks": $('#wremark').val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！</div>";
                    $("#wremarks").after(mess);
                    location.reload();
                }else{
                    alert('仓库修改失败,请重试');
                }
            }
        })
    });
    //删除仓库
    $('#submit_deletew').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Warehouse/WDelete",
            data: {
                "Wid": $('#wid').val(),
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    //var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！</div>";
                    //$("#wremarks").after(mess);
                    alert('删除成功!');
                    location.href = "index.php?r=smanagement/Index";
                }else{
                    alert('仓库删除失败,请重试');
                }
            }
        })
    });

    /////////////////////////////////货物/////////////////////////////////
    //新增货物
    $('#submit_addg').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Goods/AddGoods",
            data: {
                "WName": $('#wname').val(),
                "WLeader": $('#wleader').val(),
                "WAddress": $('#waddress').val(),
                "WRemarks": $('#wremark').val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！<a href=\"index.php?r=smanagement/Warehouse&Wid= "+data.warehouse_id+"\">点击查看仓库</a></div>";
                    $("#wremarks").after(mess);
                }else{
                    alert('货物添加失败,请重试');
                }
            }
        })
    });
    //修改货物
    $('#submit_updateg').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Goods/UpdateGoods",
            data: {
                "Wid": $('#wid').val(),
                "WName": $('#wname').val(),
                "WLeader": $('#wleader').val(),
                "WAddress": $('#waddress').val(),
                "WRemarks": $('#wremark').val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！</div>";
                    $("#wremarks").after(mess);
                    location.reload();
                }else{
                    alert('货物修改失败,请重试');
                }
            }
        })
    });
    //删除货物
    $('#submit_deleteg').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Goods/DeleteGoods",
            data: {
                "Wid": $('#wid').val(),
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    //var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！</div>";
                    //$("#wremarks").after(mess);
                    alert('删除成功!');
                    location.href = "index.php?r=smanagement/Index";
                }else{
                    alert('货物删除失败,请重试');
                }
            }
        })
    });

    /////////////////////////////////员工/////////////////////////////////
    //新增员工
    $('#submit_adds').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Warehouse/WAdd",
            data: {
                "WName": $('#wname').val(),
                "WLeader": $('#wleader').val(),
                "WAddress": $('#waddress').val(),
                "WRemarks": $('#wremark').val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！<a href=\"index.php?r=smanagement/Warehouse&Wid= "+data.warehouse_id+"\">点击查看仓库</a></div>";
                    $("#wremarks").after(mess);
                }else{
                    alert('员工添加失败,请重试');
                }
            }
        })
    });
    //修改员工
    $('#submit_updates').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Employee/WChange",
            data: {
                "Wid": $('#wid').val(),
                "WName": $('#wname').val(),
                "WLeader": $('#wleader').val(),
                "WAddress": $('#waddress').val(),
                "WRemarks": $('#wremark').val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！</div>";
                    $("#wremarks").after(mess);
                    location.reload();
                }else{
                    alert('员工修改失败,请重试');
                }
            }
        })
    });
    //删除员工
    $('#submit_deletes').click(function(){
        $.ajax({
            url: "/SMS/store management system/dscms/index.php?r=Warehouse/WDelete",
            data: {
                "Wid": $('#wid').val(),
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    //var mess = "<div class=\"alert alert-success\" role=\"alert\">操作成功！</div>";
                    //$("#wremarks").after(mess);
                    alert('删除成功!');
                    location.href = "index.php?r=smanagement/Index";
                }else{
                    alert('员工删除失败,请重试');
                }
            }
        })
    });
});