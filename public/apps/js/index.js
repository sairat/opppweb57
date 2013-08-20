/**
 * Created by SAIRAT on 8/8/2556.
 */
$(function() {
    var tmp = {
        clear: function() {
            $('#tboUid').val('');
            $('#tboPwd').val('');
        }
    };

    $('#btnLogin').click(function(e) {
        var url = 'index/get_login',
            params = {
                uid: $('#tboUid').val(),
                pwd: $('#tboPwd').val()
            };
        if(params.uid != '' && params.pwd != '') {
            app.ajax(url, { data: params }, function(err, data) {
                if(data != null) {
                    if(data.success) {
                        location.href = site_url;
                    } else {
                        app.alert(data.msg);
                    }
                } else {
                    app.alert(err);
                }
            });
        } else {
            app.alert('กรุณากรอกข้อมูลให้ครบด้วย !');
        }
        e.preventDefault();
    });

    tmp.clear();
});