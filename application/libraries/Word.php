<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/vendor/autoload.php";

class Word extends  \PhpOffice\PhpWord\PhpWord {
    public function __construct() { 
        parent::__construct(); 
    } 
}
?>