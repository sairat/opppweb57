<?php
/**
 * Created by PhpStorm.
 * User: SAIRAT
 * Date: 8/8/2556
 * Time: 12:35 น.
 */
class RegisterController extends ControllerBase {
    public function initialize() {
        $this->view->setTemplateAfter('home');
        Phalcon\Tag::setTitle('สมัครสมาชิก');
        parent::initialize();
    }

    public function indexAction() {

    }

    public function check_duplicateAction() {
        $this->view->disable();
        $render = new Basics();

        if($this->request->isPost()) {
            $data = $this->request->getPost('data');

            $rs = TbUsers::query()
                ->where('usr_uid=:uid:')
                ->bind(array('uid' => $data['uid']))
                ->execute();
            if(count($rs) > 0) {
                $json = '{ "success": false, "msg": "ชื่อเข้าระบบซ้ำ กรุณาใช้ชื่อเข้าระบบอื่น" }';
            } else {
                $rs = TbUsers::query()
                    ->where('usr_email=:email:')
                    ->bind(array('email' => $data['email']))
                    ->execute();
                if(count($rs) > 0) {
                    $json = '{ "success": false, "msg": "อีเมล์นี้มีผู้ใช้งานแล้ว กรุณาใช้อีเมลอื่น" }';
                } else {
                    $json = '{ "success": true, "msg": "ใช้ชื่อเข้าระบบกับ อีเมล์นี้ได้" }';
                }
            }
        }
        $render->render_json($json);
    }

    public function set_registerAction() {
        $this->view->disable();
        $render = new Basics();

        if($this->request->isPost()) {
            $d = $this->request->getPost('data');
            $rs = new TbUsers();
            $rs->usr_uid    = $d['uid'];
            $rs->usr_pwd    = $this->security->hash($d['pwd']);
            $rs->usr_name   = $d['name'];
            $rs->usr_jungwat = $d['jungwat'];
            $rs->usr_amphur = $d['amphur'];
            $rs->usr_hospital = $d['hospital'];
            $rs->usr_depart = $d['depart'];
            $rs->usr_mobile = $d['mobile'];
            $rs->usr_url    = $d['url'];
            $rs->usr_email  = $d['email'];
            $rs->usr_active = 'F';

            if($rs->save()) {
                $json = '{ "success": true, "msg": "ลงทะเบียนเรียบร้อยแล้ว" }';
            } else {
                $json = '{ "success": false, "msg": "พบข้อผิดพลาดในการลงทะเบียน" }';
            }
            $render->render_json($json);
        }
    }

    public function get_jungwatAction() {
        $this->view->disable();
        $rs = TbProvince::find();
        if(count($rs) > 0) {
            $json = '{ "success": true, "rows": '.json_encode($rs->toArray()).' }';
        } else {
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        }

        $render = new Basics();
        $render->render_json($json);
    }

    public function get_amphurAction() {
        $this->view->disable();
        $id = $this->request->getPost('id');
        $rs = TbAmphur::query()
            ->where('PROVINCE_ID=:jungwat:')
            ->bind(array('jungwat' => $id))
            ->execute();
        if(count($rs) > 0) {
            $json = '{ "success": true, "rows": '.json_encode($rs->toArray()).' }';
        } else {
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        }
        $render = new Basics();
        $render->render_json($json);
    }

    public function getAmphurCodeById($id) {
        $rs = TbAmphur::query()
            ->where('AMPHUR_ID=:id:')
            ->bind(array('id' => $id))
            ->execute();
        if(count($rs) > 0)
            return $rs[0]->AMPHUR_CODE;
        else
            return '';
    }

    public function get_hospitalAction() {
        $this->view->disable();
        $id = $this->request->getPost('id');
        $id = $this->getAmphurCodeById($id);
        if($id != '') {
            $rs = TbHospital::find(array(
                "CATM LIKE '".$id."%'"
            ));

            if(count($rs) > 0)
                $json = '{ "success": true, "rows": '.json_encode($rs->toArray()).' }';
            else
                $json = '{ "success": false, "msg": "ไม่มีข้อมูล ID='.$id.'" }';
        } else {
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        }
        $render = new Basics();
        $render->render_json($json);
    }
}