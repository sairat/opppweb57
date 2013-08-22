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
        $phql = "SELECT u.usr_id, u.usr_hospital, h.HNAME FROM TbUsers as u LEFT JOIN TbHospital as h ON u.usr_hospital=h.HMAIN WHERE u.usr_id=:usrid: LIMIT 1";
        $data = $this->modelsManager->executeQuery($phql, array(
            'usrid' => $this->session->get('usr_id')
        ));
        $url = new Phalcon\Mvc\Url();
        $this->view->setVar('posts', $data[0]);
        $this->view->setVar('opt', $opt);
        $this->view->pick('sendfile/week');
    }

    public function optionAction($opt) {
        $this->view->setVar('opt', $opt);
        $this->view->pick('sendfile/option');
    }

    public function set_upload_weekAction() {
        $this->view->disable();
        if($this->request->isPost()) {
            $id = $this->request->getPost('tboId');
            $pcu = $this->request->getPost('tboPcu');
            $file = $this->request->getPost('tboFile');
            $date = $this->request->getPost('tboDate');
            $opt = $this->request->getPost('tboOpt');   //week or month
            $type = $this->request->getPost('tboType'); // F21 , F43

            $upload_path = 'upload/';
            if(!file_exists($upload_path))
                mkdir($upload_path);

            $upload_path .= $opt.'/';
            if(!file_exists($upload_path))
                mkdir($upload_path);

            $upload_path .= $type.'/';
            if(!file_exists($upload_path))
                mkdir($upload_path);

            $upload_path .= $pcu.'/';
            if(!file_exists($upload_path))
                mkdir($upload_path);

            $file_name = '';

            if ($this->request->hasFiles() == true) {
                foreach($this->request->getUploadedFiles() as $f) {
                    $f->moveTo($upload_path.$f->getName());
                    $file_name = $f->getName();
                }

                $rs = $this->modelsManager->executeQuery("INSERT INTO tbSendFile VALUES (NULL, NOW(), :folder:, :type:, :hospital:, :filename:, :usrid:, :date_data:, 'รับจาก รพ.สต.')", array(
                    'folder'     => $opt,
                    'type'       => $type,
                    'hospital'   => $pcu,
                    'filename'   => $file_name,
                    'usrid'      => $id,
                    'date_data'  => $date
                ));
                $json = '{ "success": true, "msg":"Ok -> '.$file_name.'" }';
            } else {
                $json = '{ "success": false, "msg": "No send file->'.$file.'" }';
            }

            $render = new Basics();
            $render->render_json($json);
        }
    }
}

