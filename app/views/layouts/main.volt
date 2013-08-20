<!--
/** หน้าเว็บหลัก
 * Created by PhpStorm.
 * User: SAIRAT
 * Date: 8/8/2556
 * Time: 11:13 น.
 */
-->
<div class="navbar navbar-static-top navbar-inverse bs-docs-nav">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url() }}">OP-PP Individual Center</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a href="{{ url() }}">หน้าหลัก</a></li>
            <li><a href="{{ url('sendfile') }}">ส่งข้อมูล</a></li>
        </ul>

        <ul class="nav navbar-nav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $this->session->get('usr_name'); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">โปรไฟล์</a></li>
                    <li><a href="#">เปลี่ยนรหัสผ่าน</a></li>
                    <li><a data-id="btnSignOut" href="#">ออกจากระบบ</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="container">
    {{ content() }}
    <hr>
    <footer>
        <p>&copy; Sairat 2013</p>
    </footer>
</div>
<script language="JavaScript">
    $(function() {
        $('a[data-id="btnSignOut"]').click(function(e) {
            e.preventDefault();
            if(app.confirm('ยืนยันการออกจากระบบ', function(cb) {
                if(cb) {
                    app.ajax('index/set_signout', {}, function(err, data) {
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
                }
            }));
        });
    });
</script>