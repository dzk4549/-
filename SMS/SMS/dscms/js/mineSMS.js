/**
 * Created by Administrator on 2016/3/26.
 */
$(function() {
    $('#aaa').click(function(){
        $.ajax({
            url: "/SMS/sms/dscms/index.php?r=smanagement/LogintoSMS",
            data: {
                "id": scenicId,
                "tid": tid
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data.error.error_id == 0){
                    window.location.replace("/SMS/sms/dscms/index.php?r=Warehouse/arehouse");
                }
            }
        })
    });
});