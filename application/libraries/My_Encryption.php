<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_Encryption extends CI_Encryption {

    function encrypt($data, array $params = NULL, $url_safe = TRUE) {
        $ret = parent::encrypt($data, $params);

        if ($url_safe) {
            $ret = strtr($ret, array('+' => '.', '=' => '-', '/' => '~'));
        }

        return $ret;
    }

    function decrypt($data, array $params = NULL) {
        $string = strtr($data, array('.' => '+', '-' => '=', '~' => '/'));

        return parent::decrypt($string, $params);
    }

}
