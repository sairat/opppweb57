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

    public function monthAction($opt) {
        $phql = "SELECT u.usr_id, u.usr_hospital, h.HNAME FROM TbUsers as u LEFT JOIN TbHospital as h ON u.usr_hospital=h.HMAIN WHERE u.usr_id=:usrid: LIMIT 1";
        $data = $this->modelsManager->executeQuery($phql, array(
            'usrid' => $this->session->get('usr_id')
        ));
        $url = new Phalcon\Mvc\Url();
        $this->view->setVar('posts', $data[0]);
        $this->view->setVar('opt', $opt);
        $this->view->pick('sendfile/month');
    }

    public function optionAction($opt) {
        $this->view->setVar('opt', $opt);
        $this->view->pick('sendfile/option');
    }

    public function chk_file_duplicateAction() {
        $this->view->disable();
        $file = $this->request->getPost('file');
        $month = $this->request->getPost('month');
        $folder = $this->request->getPost('folder');
        $type = $this->request->getPost('type');
        $rs = TbSendFile::find(array("sf_filename='".$file."' AND sf_hospital='".$this->session->get('usr_hospital')."' AND sf_month='".$month."' AND sf_folder='".$folder."' AND sf_type='".$type."'"));
        if(count($rs)) {
            $json = '{ "success": true, "msg": "ไฟล์ซ้ำ" }';
        } else {
            $json = '{ "success": false, "msg": "ยังไม่มีไฟล์นี้" }';
        }
        $render = new Basics();
        $render->render_json($json);
    }

    public function set_upload_weekAction() {
        $this->view->disable();
        if($this->request->isPost()) {
            $id = $this->request->getPost('tboId');
            $pcu = $this->request->getPost('tboPcu');
            $date = $this->request->getPost('tboDate');
            $opt = $this->request->getPost('tboOpt');   // F21 , F43
            $type = $this->request->getPost('tboType'); //week or month
            $month = substr($date, 0, 7);

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

            $upload_path .= $month.'/';
            if(!file_exists($upload_path))
                mkdir($upload_path);

            $file_name = '';

            if ($this->request->hasFiles() == true) {
                foreach($this->request->getUploadedFiles() as $f) {
                    $f->moveTo($upload_path.$f->getName());
                    $file_name = $f->getName();
                }

                $this->modelsManager->executeQuery("INSERT INTO tbSendFile VALUES (NULL, NOW(), :folder:, :type:, :hospital:, :month:, :filename:, :usrid:, :date_data:, 'รับจาก รพ.สต.')", array(
                    'folder'     => $opt,
                    'type'       => $type,
                    'hospital'   => $pcu,
                    'month'   => $month,
                    'filename'   => $file_name,
                    'usrid'      => $id,
                    'date_data'  => $date
                ));
                echo 'อับโหลดไฟล์เสร็จสมบูรณ์  รอ 5 นาที หรือ <a style="color: #FF0000;" href="../sendfile">คลิกที่นี่</a>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=../sendfile">';
            } else {
                echo 'การอับโหลดไฟล์<b style="color: #FF0000;">ผิดพลาด</b>  รอ 5 นาที หรือ <a style="color: #FF0000;" href="../sendfile">คลิกที่นี่</a>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=../sendfile">';
            }
        }
    }

    public function set_upload_monthAction() {
        $this->view->disable();
        $render = new Basics();
        if($this->request->isPost()) {
            $id = $this->request->getPost('tboId');
            $pcu = $this->request->getPost('tboPcu');
            $month = $this->request->getPost('cboMonth');
            $year = $this->request->getPost('cboYear');
            $opt = $this->request->getPost('tboOpt');   // F21 , F43
            $type = $this->request->getPost('tboType'); //week or month
            $month = ((int)$year - 543).'-'.$render->str_format($month, '00');

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

            $upload_path .= $month.'/';
            if(!file_exists($upload_path))
                mkdir($upload_path);

            if ($this->request->hasFiles() == true) {
                foreach($this->request->getUploadedFiles() as $f) {
                    $f->moveTo($upload_path.$f->getName());

                    $phql = "INSERT INTO tbSendFile VALUES (NULL, NOW(), :folder:, :type:, :hospital:, :month:, :filename:, :usrid:, :date_data:, 'รับจาก รพ.สต.')";
                    $this->modelsManager->executeQuery($phql, array(
                        'folder'     => $opt,
                        'type'       => $type,
                        'hospital'   => $pcu,
                        'month'   => $month,
                        'filename'   => $f->getName(),
                        'usrid'      => $id,
                        'date_data'  => $month
                    ));
                }

                echo 'อับโหลดไฟล์เสร็จสมบูรณ์  รอ 5 นาที หรือ <a style="color: #FF0000;" href="../sendfile">คลิกที่นี่</a>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=../sendfile">';
            } else {
                echo 'การอับโหลดไฟล์<b style="color: #FF0000;">ผิดพลาด</b>  รอ 5 นาที หรือ <a style="color: #FF0000;" href="../sendfile">คลิกที่นี่</a>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=../sendfile">';
            }
        }
    }
}

