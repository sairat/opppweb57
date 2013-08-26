/**
 * Created by SAIRAT on 8/8/2556.
 */
var month_th = [ 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม' ];
var app = {
    ajax: function(url, params, cb){
        try{
            $.ajax({
                url         : site_url +  '/' + url,
                type        : 'POST',
                timeout     : 50000,
                dataType    : 'json',

                data        : params,

                success     : function(data){
                    if(data.success){
                        if(data){
                            cb(null, data);
                        } else {
                            cb('Record not found.', null);
                        }
                    }else{
                        cb(data.msg, null);
                    }
                },
                error       : function(xhr, status){
                    cb('Error:  [' + xhr.status + '] ' + xhr.statusText, null);
                }
            });
        }catch(err){
            cb(err, null);
        }
    },
    confirm: function(msg, cb){
        if(confirm(msg))
            cb(true);
        cb(false);
    },
    alert: function(msg){
        alert(msg);
    },
    isValidEmailAddress: function(emailAddress) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
    },
    convertDateRangeToThai: function(dateRange) {
        var d1 = dateRange.substr(0, 10);
        var d2 = dateRange.substr(-10);

        return app.convertDateToThai(d1) + ' ถึงวันที่ ' + app.convertDateToThai(d2);
    },
    convertDateToThai: function(_date) {
        var _y, _m, _d;
        _y = parseInt(_date.substr(0, 4));
        _y += 543;
        _d = _date.substr(8);
        _m = _date.substr(5, 2);

        return _d + ' ' + app.get_month(_m) +' '+ _y;
    },
    get_month: function(_m) {
        var tmp_m = [ 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม' ];
        return tmp_m[--_m];
    }
};

$(function() {
    $('.daterange').daterangepicker(
        {
            startDate: moment().subtract('days', 7),
            endDate: moment(),
            //minDate: '2012-10-01',
            //maxDate: '2014-09-30',
            //dateLimit: { days: 60 },
            showDropdowns: false,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: false,
            /*
            ranges: {
                'วันนี้': [moment(), moment()],
                'เมื่อวานนี้': [moment().subtract('days', 1), moment().subtract('days', 1)],
                '7 วัน ล่าสุด': [moment().subtract('days', 6), moment()],
                '1 เดือน ล่าสุด': [moment().subtract('days', 29), moment()],
                'เดือนนี้': [moment().startOf('month'), moment().endOf('month')],
                'เดือนล่าสุด': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },*/
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'YYYY-MM-DD',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                fromLabel: 'จากวันที่',
                toLabel: 'ถึงวันที่',
                customRangeLabel: 'ช่วงวันที่ แบบกำหนดเอง',
                daysOfWeek: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.','ส.'],
                monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                firstDay: 1
            }
        },
        function(start, end) {
            console.log("Callback has been called!");
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );
});
