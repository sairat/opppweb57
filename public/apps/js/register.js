/**
 * Created by Mr.Utit Sairat
 * Email: soodteeruk@gmail.com
 * Date: 14/8/2556 13:14 น.
 */
$(function() {
    var tmp = {
        clear: function() {
            $('#tboUid').val('');
            $('#tboPwd').val('');
            $('#tboRePwd').val('');
            $('#tboName').val('');
            $('#tboJungwat').val('');
            $('#tboAmphur').val('');
            $('#tboHospital').val('');
            $('#tboDepart').val('');
            $('#tboMobile').val('');
            $('#tboEmail').val('');
            $('#tboUrl').val('');
            $('#tboOpt').val('0');
        },
        check_duplicate: function() {
            var url = 'register/check_duplicate',
                params = { uid: $('#tboUid').val(), email: $('#tboEmail').val() };
            app.ajax(url, { data: params }, function(err, data) {
                if(data != null) {
                    if(!data.success) {
                        $('#tboOpt').val('0');
                        app.ajax(data.msg);
                    } else {
                        $('#tboOpt').val('1');
                    }
                } else {
                    $('#tboOpt').val('0');
                    app.alert(err);
                }
            });
        },
        get_jungwat: function() {
            app.ajax('register/get_jungwat', {}, function(err, data) {
                $('#cboJungwat').empty();
                $('#cboJungwat').append('<option value="">-- เลือกจังหวัด --</option>');
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#cboJungwat').append('<option value="'+ v.PROVINCE_ID +'">'+ v.PROVINCE_NAME +'</option>');
                    });
                }
            });
        },
        get_amphur: function(id) {
            app.ajax('register/get_amphur', { id: id }, function(err, data) {
                $('#cboAmphur').empty();
                $('#cboAmphur').append('<option value="">-- เลือกอำเภอ --</option>');
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#cboAmphur').append('<option value="'+ v.AMPHUR_ID +'">'+ v.AMPHUR_NAME +'</option>');
                    });
                }
            });
        },
        get_hospital: function(id) {
            app.ajax('register/get_hospital', { id: id }, function(err, data) {
                $('#cboHospital').empty();
                $('#cboHospital').append('<option value="">-- เลือกสถานที่ปฏิบัติงาน --</option>');
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#cboHospital').append('<option value="'+ v.HMAIN +'">[ '+ v.HMAIN +' ] '+ v.HNAME +'</option>');
                    });
                }
            });
        }
    };

    $('#cboJungwat').change(function() {
        if($('#cboJungwat').val() != '')
            tmp.get_amphur($('#cboJungwat').val());
    });

    $('#cboAmphur').change(function() {
        if($('#cboAmphur').val() != '')
            tmp.get_hospital($('#cboAmphur').val());
    });

    $('#btnSave').click(function(e) {
        e.preventDefault();
        var url = 'register/set_register',
            params = {
                uid: $('#tboUid').val(),
                pwd: $('#tboPwd').val(),
                repwd: $('#tboRePwd').val(),
                name: $('#tboName').val(),
                depart: $('#tboDepart').val(),
                mobile: $('#tboMobile').val(),
                email: $('#tboEmail').val(),
                url: $('#tboUrl').val(),
                jungwat: $('#cboJungwat').val(),
                amphur: $('#cboAmphur').val(),
                hospital: $('#cboHospital').val()
            };
        if(params.uid != '' && params.pwd != '' &&
            params.repwd != '' && params.name != '' &&
            params.depart != '' && params.mobile != '' &&
            params.email != '' && params.hospital != '') {

            if(app.isValidEmailAddress(params.email)) {
                app.ajax('register/check_duplicate', { data: { uid: $('#tboUid').val(), email: $('#tboEmail').val() } }, function(err, data) {
                    if(data != null) {
                        if(!data.success) {
                            app.ajax(data.msg);
                        } else {
                            if(params.pwd == params.repwd) {
                                app.ajax(url, { data:params }, function(err, data) {
                                    if(data != null) {
                                        app.alert(data.msg);
                                        tmp.clear();
                                    } else {
                                        app.alert(err);
                                    }
                                });
                            } else {
                                app.alert('รหัสผ่านไม่ถูกต้อง');
                            }
                        }
                    } else {
                        app.alert(err);
                    }
                });
            } else {
                app.alert('อีเมล์ไม่ถูกต้อง !');
            }

        } else {
            app.alert('กรุณากรอกข้อมูลให้ครบด้วย !');
        }
    });

    tmp.get_jungwat();
    tmp.clear();
});