<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_api
 * 
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */
require APPPATH.'/libraries/REST_Controller.php';

class Report_api extends REST_Controller {
    //put your code here
    function user_get()
    {
        //Respond with information about a user
    }
    
    function user_post()
    {
        //$this->some_model->updateUser( $this->get('id') );
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
}
