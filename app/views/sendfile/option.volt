<!--
/**
 * Created by Mr.Utit Sairat
 * Email: soodteeruk@gmail.com
 * Date: 20/8/2556 8:40 น.
 */
-->
<ul class="breadcrumb">
    <li><a href="{{ url() }}">หน้าหลัก</a></li>
    <li><a href="{{ url('sendfile') }}">ส่งข้อมูล</a></li>
    <li class="active">ตัวเลือกข้อมูล</li>
</ul>

<div class="listview grid-layout" id="lstMain">
    <a class="listview-item bg-color-pink" href="{{ url('sendfile/week/') }}{{ opt }}">
        <div class="pull-left">
            <div class="listview-item-object icon-magic"></div>
        </div>
        <div class="listview-item-body">
            <h4 class="listview-item-heading">ส่งข้อมูลรายสัปดาห์</h4>
            ส่งข้อมูลแบบรายสัปดาห์ หรือตามช่วงวันที่ที่กำหนด
        </div>
    </a>

    <a class="listview-item bg-color-green" href="{{ url('sendfile/month/') }}{{ opt }}">
        <div class="pull-left">
            <div class="listview-item-object icon-ambulance"></div>
        </div>
        <div class="listview-item-body">
            <h4 class="listview-item-heading">ส่งข้อมูลรายเดือน</h4>
            ส่งข้อมูลแบบรายเดือน
        </div>
    </a>
</div>
