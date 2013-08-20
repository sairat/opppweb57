<?php


class TbAutonumbers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $at_id;
     
    /**
     *
     * @var string
     */
    public $at_name;
     
    /**
     *
     * @var string
     */
    public $at_value;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'at_id' => 'at_id', 
            'at_name' => 'at_name', 
            'at_value' => 'at_value'
        );
    }

}
