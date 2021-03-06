
<div class="container">
    <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="icon-key"></i> ลงชื่อเข้าใช้</div>
            <div class="panel-body">
                <form class="form-horizontal" autocomplete="off">
                    <div class="form-group">
                        <label for="tboUid" class="col-lg-3 control-label">ชื่อเข้าระบบ</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="tboUid" placeholder="ชื่อเข้าระบบ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tboPwd" class="col-lg-3 control-label">รหัสผ่าน</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" id="tboPwd" placeholder="รหัสผ่าน">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button id="btnLogin" type="submit" class="btn btn-success"><i class="icon-check"></i> เข้าสู่ระบบ</button>
                            <button id="btnResetPwd" type="submit" class="btn btn-info"><i class="icon-refresh"></i> ลืมรหัสผ่าน</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('apps/js/index.js'))); ?>