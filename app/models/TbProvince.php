<?php


class TbProvince extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $PROVINCE_ID;
     
    /**
     *
     * @var string
     */
    public $PROVINCE_CODE;
     
    /**
     *
     * @var string
     */
    public $PROVINCE_NAME;
     
    /**
     *
     * @var integer
     */
    public $GEO_ID;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'PROVINCE_ID' => 'PROVINCE_ID', 
            'PROVINCE_CODE' => 'PROVINCE_CODE', 
            'PROVINCE_NAME' => 'PROVINCE_NAME', 
            'GEO_ID' => 'GEO_ID'
        );
    }

}
