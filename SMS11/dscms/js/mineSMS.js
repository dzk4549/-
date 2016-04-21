/**
 * Created by Administrator on 2016/3/26.
 */
$(function() {
    $('#login-btn').click(function(){
        $.ajax({
            url: "/SMS/sms/dscms/index.php?r=smanagement/LogintoSMS",
            data: {
                "SID": $("#userid").val(),
                "password": $("#password").val()
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    window.location.replace("/SMS/SMS/dscms/index.php?r=Smanagement/Index");
                }else{
                    alert(data.error.mess);
                }
            }
        })
    });
});