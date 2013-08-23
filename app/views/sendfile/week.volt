<!--
/**
 * Created by PhpStorm.
 * User: SAIRAT
 * Date: 19/8/2556
 * Time: 13:44 น.
 */
-->
<ul class="breadcrumb">
    <li><a href="{{ url() }}">หน้าหลัก</a></li>
    <li><a href="{{ url('sendfile') }}">ส่งข้อมูล</a></li>
    <li class="active">ตัวเลือกข้อมูล</li>
</ul>

<form action="{{ url('sendfile/set_upload_week') }}" method="post" enctype="multipart/form-data" id="frmMain">
    <input type="hidden" name="tboId" id="tboId" value="{{ posts.usr_id }}">
    <input type="hidden" name="tboPcu" id="tboPcu" value="{{ posts.usr_hospital }}">
    <input type="hidden" name="tboOpt" id="tboOpt" value="{{ opt }}">
    <input type="hidden" name="tboType" id="tboType" value="week">
    <div id="wizard">
        <ol>
            <li>เลือกช่วงของข้อมูล</li>
            <li>เลือกไฟล์อับโหลด</li>
        </ol>
        <div>
            <h4>เลือกช่วงของข้อมูล</h4>
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label" for="tboBegin">ข้อมูลจากวันที่ถึงวันที่</label>
                    <input type="text" class="form-control daterange" name="tboDate" id="tboDate" readonly>
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
                    <label class="control-label" id="lblDate"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-3">
                    <label class="control-label">เลือกไฟล์</label>
                </div>
                <div class="col-md-8">
                    <input type="file" name="tboFile" id="tboFile">
                </div>
            </div>
        </div>
    </div>
</form>

{{ javascript_include(['src':url('apps/js/sendfile.week.js')]) }}