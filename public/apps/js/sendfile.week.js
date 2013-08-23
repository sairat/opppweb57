/**
 * Created by Mr.Utit Sairat
 * Email: soodteeruk@gmail.com
 * Date: 19/8/2556 13:46 น.
 */
$(function() {
    $("#wizard").bwizard({
        backBtnText: '<- ย้อนกลับ',
        nextBtnText: 'ถัดไป ->',
        clickableSteps: false,
        activeIndexChanged: function(e, ui) {
            //console.log(ui);
            $('li.next > a').html('ถัดไป ->');
            switch(ui.index) {
                case 1 :
                    if($('#tboDate').val() == '') {
                        app.alert('กรุณาเลือกช่วงวันที่ก่อน');
                        $("#wizard").bwizard('back');
                    } else {
                        $('#lblDate').html(app.convertDateRangeToThai($('#tboDate').val()));
                        $('li.next').removeClass('disabled');
                        $('li.next > a').html(': ส่งข้อมูล :');
                    }
                    break;
            }
        }
    });

    $('li.next').click(function(e) {
        if($('li.next > a').html() == ': ส่งข้อมูล :') {
            if($('#tboFile').val() == '') {
                app.alert('กรุณากรอกข้อมูลให้ครบด้วย !');
            } else {
                app.ajax('sendfile/chk_file_duplicate', { file: $('#tboFile').val() }, function(err, data) {
                    if(data != null) {
                        if(data.success) {
                            app.alert('ไฟล์นี้เคยอับโหลดขึ้นแล้ว ! หากต้องการนำเข้าใหม่ให้ติดต่อผู้ดูแลให้ลบออกให้ก่อน');
                        } else {
                            $('#frmMain').submit();
                        }
                    } else {
                        $('#frmMain').submit();
                    }
                });
            }

//            var url = 'sendfile/set_upload_week',
//                params = {
//                    id: $('#tboId').val(),
//                    pcu: $('#tboPcu').val(),
//                    file: $('#tboFile').val(),
//                    date: $('#tboDate').val(),
//                    opt: $('#tboOpt').val(),
//                    type: 'week'
//                };
//            if(params.file == '') {
//                app.alert('กรุณากรอกข้อมูลให้ครบด้วย !');
//            } else {
//                app.ajax(url, params, function(err, data) {
//                    if(data != null) {
//                        if(data.success) {
//                            location.href = site_url + '/sendfile';
//                        }
//                    } else {
//                        app.alert(err);
//                    }
//                });
//            }
        }
    });
});