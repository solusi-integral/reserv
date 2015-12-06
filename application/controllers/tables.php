<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Tables
 * 
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */

class Tables extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->library('table');
            $this->load->helper('html');         
            $this->load->model('report_model');
            
            $data['query']   = $this->report_model->get_races();
            $this->load->view('tables', $data);
	}
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */