<!--
/**     หน้าล็อกอิน
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
        <ul class="nav navbar-nav pull-right">
            <li><a href="{{ url('register') }}"><i class="icon-user"></i> สมัครสมาชิก</a></li>
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

