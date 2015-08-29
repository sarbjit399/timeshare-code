<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @package extends the Exception class
 * this creates a error log file
 */
class custom_exception extends Exception {

    public function errorMessage() {
        //error message
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                . ': ' . $this->getMessage();
        error_log($errorMsg);
        return $errorMsg;
    }

}
