<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        if($this->session->has('usr_uid'))
            $this->view->setTemplateAfter('main');
        else
            $this->view->setTemplateAfter('home');
        Phalcon\Tag::setTitle('หน้าหลัก');
        parent::initialize();
    }

    public function indexAction()
    {
        if($this->session->has('usr_uid'))
            $this->view->pick('index/home');
    }

    public function get_loginAction() {
        $this->view->disable();
        $render = new Basics();

        if($this->request->isPost()) {
            $data = $this->request->getPost('data');

            $rs = TbUsers::query()
                ->where('usr_uid=:uid:')
                ->addWhere('usr_active=:active:')
                ->bind(array('uid' => $data['uid'], 'active' => 'F'))
                ->execute();

            if(count($rs)) {
                if($this->security->checkHash($data['pwd'], $rs[0]->usr_pwd)) {
                    $this->session->set('usr_id', $rs[0]->usr_id);
                    $this->session->set('usr_uid', $rs[0]->usr_uid);
                    $this->session->set('usr_name', $rs[0]->usr_name);

                    $json = '{ "success": true, "msg": "ยินดีต้อนรับ" }';
                } else {
                    $json = '{ "success": false, "msg": "รหัสผ่านไม่ถูกต้อง" }';
                }
            } else {
                $json = '{ "success": false, "msg": "ชื่อผู้ใช้ไม่ถูกต้อง !" }';
            }
        } else {
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        }
        $render->render_json($json);
    }

    public function set_signoutAction() {
        $this->view->disable();
        $this->session->destroy();
        $json = '{ "success": true, "msg": "ออกจากระบบแล้ว" }';

        $render = new Basics();
        $render->render_json($json);
    }
}

