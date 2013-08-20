<?php

class SendfileController extends ControllerBase
{
    public function initialize() {
        if(!$this->session->has('usr_uid'))
            $this->response->redirect('index');
        $this->view->setTemplateAfter('main');
        Phalcon\Tag::setTitle('ส่งข้อมูล');
        parent::initialize();
    }

    public function indexAction()
    {

    }

    public function get_listAction() {
        $this->view->disable();
        $rs = TbSendMenu::find(array("sem_visible='T'"));
        if(count($rs))
            $json = '{ "success": true, "rows": '.json_encode($rs->toArray()).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        $render = new Basics();
        $render->render_json($json);
    }

    public function weekAction($opt) {
        $this->view->setVar('opt', $opt);
        $this->view->pick('sendfile/week');
    }

    public function optionAction($opt) {
        $this->view->setVar('opt', $opt);
        $this->view->pick('sendfile/option');
    }
}

