/**
 * Created by Mr.Utit Sairat
 * Email: soodteeruk@gmail.com
 * Date: 19/8/2556 10:47 น.
 */
$(function() {
    var tmp = {
        get_list: function() {
            app.ajax('sendfile/get_list', {}, function(err, data) {
                $('#lstMain').empty();
                if(data != null && _.size(data.rows) > 0) {
                    _.each(data.rows, function(v) {
                        $('#lstMain').append(
                            '<a class="listview-item '+ v.sem_color +'" href="'+ v.sem_url +'/'+ v.sem_folder +'">'+
                                '<div class="pull-left">'+
                            '<div class="listview-item-object '+ v.sem_icon +'"></div>'+
                            '</div>'+
                            '<div class="listview-item-body">'+
                                '<h4 class="listview-item-heading">'+ v.sem_name +'</h4>'+ v.sem_detail +
                            '</div>'+
                            '</a>'
                        );
                    });
                }
            });
        }
    };

    tmp.get_list();
});