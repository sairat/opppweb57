<?php


class TbHospital extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $HMAIN;
     
    /**
     *
     * @var string
     */
    public $HNAME;
     
    /**
     *
     * @var string
     */
    public $PROVINCE_ID;
     
    /**
     *
     * @var string
     */
    public $HLEVEL;
     
    /**
     *
     * @var string
     */
    public $HRIB;
     
    /**
     *
     * @var string
     */
    public $HFUND;
     
    /**
     *
     * @var string
     */
    public $HPMODEL;
     
    /**
     *
     * @var string
     */
    public $CATM;
     
    /**
     *
     * @var string
     */
    public $HTYPE;
     
    /**
     *
     * @var string
     */
    public $SUBTYPE;
     
    /**
     *
     * @var string
     */
    public $DATEIN;
     
    /**
     *
     * @var string
     */
    public $DATEOUT;
     
    /**
     *
     * @var string
     */
    public $REMARK;
     
    /**
     *
     * @var string
     */
    public $WEIGHT;
     
    /**
     *
     * @var string
     */
    public $STATUS_UC;
     
    /**
     *
     * @var string
     */
    public $HNAME_TITLE;
     
    /**
     *
     * @var string
     */
    public $HNAME_NAME;
     
    /**
     *
     * @var string
     */
    public $HMAIN9;
     
    /**
     *
     * @var string
     */
    public $F_HCAP;
     
    /**
     *
     * @var string
     */
    public $F_HRESERVE;
     
    /**
     *
     * @var string
     */
    public $CROSS_PROVINCE;
     
    /**
     *
     * @var string
     */
    public $HID;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'HMAIN' => 'HMAIN', 
            'HNAME' => 'HNAME', 
            'PROVINCE_ID' => 'PROVINCE_ID', 
            'HLEVEL' => 'HLEVEL', 
            'HRIB' => 'HRIB', 
            'HFUND' => 'HFUND', 
            'HPMODEL' => 'HPMODEL', 
            'CATM' => 'CATM', 
            'HTYPE' => 'HTYPE', 
            'SUBTYPE' => 'SUBTYPE', 
            'DATEIN' => 'DATEIN', 
            'DATEOUT' => 'DATEOUT', 
            'REMARK' => 'REMARK', 
            'WEIGHT' => 'WEIGHT', 
            'STATUS_UC' => 'STATUS_UC', 
            'HNAME_TITLE' => 'HNAME_TITLE', 
            'HNAME_NAME' => 'HNAME_NAME', 
            'HMAIN9' => 'HMAIN9', 
            'F_HCAP' => 'F_HCAP', 
            'F_HRESERVE' => 'F_HRESERVE', 
            'CROSS_PROVINCE' => 'CROSS_PROVINCE', 
            'HID' => 'HID'
        );
    }

}
