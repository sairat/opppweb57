<?php
use \Phalcon\Mvc\Model\Criteria;

class TbUsers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $usr_id;
     
    /**
     *
     * @var string
     */
    public $usr_uid;
     
    /**
     *
     * @var string
     */
    public $usr_pwd;
     
    /**
     *
     * @var string
     */
    public $usr_name;

    /**
     *
     * @var int
     */
    public $usr_jungwat;

    /**
     *
     * @var int
     */
    public $usr_amphur;

    /**
     *
     * @var string
     */
    public $usr_hospital;

    /**
     *
     * @var string
     */
    public $usr_depart;

    /**
     *
     * @var string
     */
    public $usr_mobile;

    /**
     *
     * @var string
     */
    public $usr_email;

    /**
     *
     * @var string
     */
    public $usr_url;

    /**
     *
     * @var char
     */
    public $usr_active;

    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'usr_id' => 'usr_id', 
            'usr_uid' => 'usr_uid', 
            'usr_pwd' => 'usr_pwd', 
            'usr_name' => 'usr_name',
            'usr_jungwat' => 'usr_jungwat',
            'usr_amphur' => 'usr_amphur',
            'usr_hospital' => 'usr_hospital',
            'usr_depart' => 'usr_depart',
            'usr_mobile' => 'usr_mobile',
            'usr_email' => 'usr_email',
            'usr_url' => 'usr_url',
            'usr_active' => 'usr_active'
        );
    }

}
