<?php

namespace OpenSRS\trust;

use OpenSRS\Base;
use OpenSRS\Exception;

/*
 *  Required object values:
 *  - none -
 *
 *  Optional Data:
 *  data - owner_email, admin_email, billing_email, tech_email, del_from, del_to, exp_from, exp_to, page, limit
 */

class CreateToken extends Base 
{
    protected $action = "create_token";
    protected $object = "trust_service";

    private $_formatHolder = '';
    public $resultFullRaw;
    public $resultRaw;
    public $resultFullFormatted;
    public $resultFormatted;

    public function __construct($formatString, $dataObject, $returnFullResponse = null)
    {
        parent::__construct();

        $this->_formatHolder = $formatString;

        $this->_validateObject($datObject, $returnFullResponse);

        $this->send($dataObject, $returnFullResponse);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    // Validate the object
    public function _validateObject($datObject)
    {
        if (!isset($dataObject->data->order_id) and !isset($dataObject->data->product_id)) {
            throw new Exception('oSRS Error - order_id or product_id is not defined.');
        }
    }
}
