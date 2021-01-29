<?php
defined('BASEPATH') or exit('No Direct Script Access Alowed');

require_once dirname(__FILE__).'/fpdf/fpdf.php';

class pdf extends FPDF
{
    function __construct() {
        parent::__construct();
    }
}