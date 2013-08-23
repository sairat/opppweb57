<ul class="breadcrumb">
    <li><a href="{{ url() }}">หน้าหลัก</a></li>
    <li class="active">ลงทะเบียน</li>
</ul>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">ลงทะเบียน</h3>
    </div>
    <div class="panel-body">
        <form autocomplete="off">
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="tboUid">ชื่อเข้าระบบ</label>
                    <input class="form-control" type="text" id="tboUid" maxlength="20" placeholder="ชื่อเข้าระบบ">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="tboPwd">รหัสผ่าน</label>
                    <input class="form-control" type="password" id="tboPwd" maxlength="20" placeholder="รหัสผ่าน">
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="tboRePwd">ยืนยันรหัสผ่าน</label>
                    <input class="form-control" type="password" id="tboRePwd" maxlength="20" placeholder="ยืนยันรหัสผ่าน">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="tboName">ชื่อ - สกุล</label>
                    <input class="form-control" type="text" id="tboName" placeholder="ชื่อ - สกุล">
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="tboUrl">เว็บไซต์ / เฟสบุ๊ค / ทวิสเตอร์</label>
                    <input class="form-control" type="text" id="tboUrl" placeholder="เว็บไซต์ / เฟสบุ๊ค / ทวิสเตอร์">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="cboJungwat">จังหวัด</label>
                    <select class="form-control" id="cboJungwat">
                        <option value="">เลือกจังหวัด</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="cboAmphur">อำเภอ</label>
                    <select class="form-control" id="cboAmphur">
                        <option value="">เลือกอำเภอ</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="cboHospital">สถานที่ปฏิบัติงาน</label>
                    <select class="form-control" id="cboHospital">
                        <option value="">เลือกสถานที่ปฏิบัติงาน</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="tboDepart">หน่วยงาน</label>
                    <input class="form-control" type="text" id="tboDepart" placeholder="หน่วยงาน">
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="tboMobile">โทรศัพท์</label>
                    <input class="form-control" type="text" id="tboMobile" placeholder="โทรศัพท์">
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="tboEmail">อีเมล์</label>
                    <input class="form-control" type="text" id="tboEmail" placeholder="อีเมล์">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-3">
                    <input type="hidden" value="" id="tboOpt">
                    <button class="btn btn-success" id="btnSave"><i class="icon-save"></i> ลงทะเบียน</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{ javascript_include(['src':url('apps/js/register.js')]) }}