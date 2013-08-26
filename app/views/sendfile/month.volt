<!--
/**
 * Created by Mr.Utit Sairat
 * Email: soodteeruk@gmail.com
 * Date: 23/8/2556 12:43 น.
 */
-->
<ul class="breadcrumb">
    <li><a href="{{ url() }}">หน้าหลัก</a></li>
    <li><a href="{{ url('sendfile') }}">ส่งข้อมูล</a></li>
    <li class="active">ตัวเลือกข้อมูล</li>
</ul>

<form action="{{ url('sendfile/set_upload_month') }}" method="post" enctype="multipart/form-data" id="frmMain">
    <input type="hidden" name="tboId" id="tboId" value="{{ posts.usr_id }}">
    <input type="hidden" name="tboPcu" id="tboPcu" value="{{ posts.usr_hospital }}">
    <input type="hidden" name="tboOpt" id="tboOpt" value="{{ opt }}">
    <input type="hidden" name="tboType" id="tboType" value="month">

    <div id="wizard">
        <ol>
            <li>เลือกช่วงของข้อมูล</li>
            <li>เลือกไฟล์อับโหลด</li>
        </ol>
        <div>
            <h4>เลือกช่วงเดือนของข้อมูล</h4>
            <div class="row">
                <div class="col-md-offset-1 col-md-4">
                    <label class="control-label" for="cboMonth">เลือกเดือน</label>
                    <select class="form-control" id="cboMonth" name="cboMonth">
                        <option value="">เลือกเดือน</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="control-label" for="cboYear">เลือกปี</label>
                    <select class="form-control" id="cboYear" name="cboYear">
                        <option value="">เลือกปี</option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <h4>อับโหลดข้อมูล</h4>
            <div class="row">
                <div class="col-md-offset-1 col-md-3">
                    <label class="control-label">สถานบริการ</label>
                </div>
                <div class="col-md-5">
                    <label class="control-label">[ {{ posts.usr_hospital }} ] {{ posts.HNAME }}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-3">
                    <label class="control-label">ช่วงของข้อมูลที่ส่ง</label>
                </div>
                <div class="col-md-5">
                    <label class="control-label" id="lblMonth"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-3">
                    <label class="control-label">เลือกไฟล์</label>
                </div>
                <div class="col-md-8">
                    <input type="file" name="tboFile[]" id="tboFile" multiple>
                </div>
            </div>
        </div>
    </div>
</form>

{{ javascript_include(['src':url('apps/js/sendfile.month.js')]) }}