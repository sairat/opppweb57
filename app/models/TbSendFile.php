<?php


class TbSendFile extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sf_id;
     
    /**
     *
     * @var string
     */
    public $sf_date;
     
    /**
     *
     * @var string
     */
    public $sf_folder;
     
    /**
     *
     * @var string
     */
    public $sf_type;
     
    /**
     *
     * @var string
     */
    public $sf_hospital;

    /**
     *
     * @var string
     */
    public $sf_month;

    /**
     *
     * @var string
     */
    public $sf_filename;
     
    /**
     *
     * @var integer
     */
    public $sf_usrid;
     
    /**
     *
     * @var string
     */
    public $sf_date_data;
     
    /**
     *
     * @var string
     */
    public $sf_status;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'sf_id' => 'sf_id', 
            'sf_date' => 'sf_date', 
            'sf_folder' => 'sf_folder', 
            'sf_type' => 'sf_type', 
            'sf_hospital' => 'sf_hospital',
            'sf_month' => 'sf_month',
            'sf_filename' => 'sf_filename',
            'sf_usrid' => 'sf_usrid', 
            'sf_date_data' => 'sf_date_data', 
            'sf_status' => 'sf_status'
        );
    }

}
