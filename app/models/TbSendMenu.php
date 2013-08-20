<?php


class TbSendMenu extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sem_id;

    /**
     *
     * @var string
     */
    public $sem_name;

    /**
     *
     * @var string
     */
    public $sem_detail;

    /**
     *
     * @var string
     */
    public $sem_folder;

    /**
     *
     * @var string
     */
    public $sem_url;

    /**
     *
     * @var string
     */
    public $sem_icon;
     
    /**
     *
     * @var string
     */
    public $sem_color;
     
    /**
     *
     * @var string
     */
    public $sem_visible;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'sem_id' => 'sem_id', 
            'sem_name' => 'sem_name',
            'sem_detail' => 'sem_detail',
            'sem_folder' => 'sem_folder',
            'sem_url' => 'sem_url', 
            'sem_icon' => 'sem_icon', 
            'sem_color' => 'sem_color', 
            'sem_visible' => 'sem_visible'
        );
    }

}
