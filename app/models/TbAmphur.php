<?php


class TbAmphur extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $AMPHUR_ID;
     
    /**
     *
     * @var string
     */
    public $AMPHUR_CODE;
     
    /**
     *
     * @var string
     */
    public $AMPHUR_NAME;
     
    /**
     *
     * @var integer
     */
    public $GEO_ID;
     
    /**
     *
     * @var integer
     */
    public $PROVINCE_ID;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'AMPHUR_ID' => 'AMPHUR_ID', 
            'AMPHUR_CODE' => 'AMPHUR_CODE', 
            'AMPHUR_NAME' => 'AMPHUR_NAME', 
            'GEO_ID' => 'GEO_ID', 
            'PROVINCE_ID' => 'PROVINCE_ID'
        );
    }

}
