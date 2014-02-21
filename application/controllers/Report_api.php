<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_api
 *
 * @author indra
 */

class Report_api extends REST_Controller {
    //put your code here
    function user_get()
    {
        //Respond with information about a user
    }
    
    function data_put()
    {
        //Create new data and information with a status / errors
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
}
