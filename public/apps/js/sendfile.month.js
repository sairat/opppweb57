/**
 * Created by Mr.Utit Sairat
 * Email: soodteeruk@gmail.com
 * Date: 23/8/2556 14:02 น.
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
                    $('#lblMonth').html(month_th[parseInt($('#cboMonth').val())-1] + ' ' + $('#cboYear').val());
                    $('li.next').removeClass('disabled');
                    $('li.next > a').html(': ส่งข้อมูล :');
                    break;
            }
        }
    });

    var tmp = {
        load_month: function() {
            $('#cboMonth').empty();
            var d = new Date();
            for(i = 0; i < 12; i++) {
                if(i == parseInt(d.getMonth()))
                    $('#cboMonth').append('<option value="'+ (i+1) +'" selected>'+ month_th[i] +'</option>');
                else
                    $('#cboMonth').append('<option value="'+ (i+1) +'">'+ month_th[i] +'</option>');
            }
        },
        load_year: function() {
            $('#cboYear').empty();
            var d = new Date();
            for(i = 2555; i <= (d.getFullYear() + 543); i++) {
                if(i == parseInt((d.getFullYear()) + 543))
                    $('#cboYear').append('<option value="'+ i +'" selected>'+ i +'</option>');
                else
                    $('#cboYear').append('<option value="'+ i +'">'+ i +'</option>');
            }
        }
    };

    tmp.load_month();
    tmp.load_year();
});
