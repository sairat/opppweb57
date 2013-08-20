<!--
/**
 * Created by PhpStorm.
 * User: SAIRAT
 * Date: 19/8/2556
 * Time: 13:44 น.
 */
-->
<div id="wizard">
    <ol>
        <li>เลือกช่วงของข้อมูล</li>
        <li>เลือกไฟล์อับโหลด</li>
        <li>เริ่มกระบวนการอับโหลด</li>
        <li>เสร็จสิ้นกระบวนการ</li>
    </ol>
    <div>
            <h4>เลือกช่วงของข้อมูล</h4>
            <div class="row">
                <div class="col-lg-12">
                    <label class="control-label" for="tboBegin">ข้อมูลจากวันที่ถึงวันที่</label>
                    <input type="text" class="form-control daterange" id="tboDate" readonly>
                </div>
            </div>
    </div>
    <div>
        <p>Page 2</p>
    </div>
    <div>
        <p>Page 3</p>
    </div>
    <div>
        <p>Page 4</p>
    </div>
</div>

<?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('apps/js/sendfile.week.js'))); ?>