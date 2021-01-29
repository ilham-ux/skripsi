<?php
defined('BASEPATH') or exit('No Direct Script Access Alowed');

require_once dirname(__FILE__).'/fpdi/fpdi.php';

class pdi extends FPDI
{
    function __construct() {
        parent::__construct();
    }
}