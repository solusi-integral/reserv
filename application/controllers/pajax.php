<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of Pajax
 * 
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */

class Pajax extends CI_Controller {

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
		$this->load->view('charts');
	}
        
        public function pjax_total()
        {
            $this->load->library('performance');
            $data['total']      = $this->performance->sumrace();
            $data['red']        = $this->performance->redrace();
            $data['green']      = $this->performance->green_percentage();
            $this->load->view('graphs_pjax_total', $data);
        }
        
        public function pjax_green()
        {
            $this->load->library('performance');
            $data['green']      = $this->performance->green_percentage();
            $this->load->view('pjax_green', $data);
        }
        
        public function pjax_status()
        {
            $this->load->library('performance');
            $data['status']     = $this->performance->status();
            $this->load->view('pjax_status', $data);
        }
        
        public function pjax_chart()
        {
            $this->load->library('performance');
            $data['gtype']      = $this->performance->GType();
            $data['rtype']      = $this->performance->RType();
            $data['ttype']      = $this->performance->TType();
            $this->load->view('pjax_chart', $data);
        }
        
        public function pjax_person()
        {
            $this->load->library('performance');
            $data['surya']      = $this->performance->individual_performance('surya');
            $data['azis']       = $this->performance->individual_performance('azis');
            $data['indra']      = $this->performance->individual_performance('indra');
            $this->load->view('pjax_person', $data);
        }
        
        public function pjax_last6()
        {
            $this->load->library('performance');
            $data['last6']      = $this->performance->last6();
            $this->load->view('pjax_last6',$data);
        }
        
        public function pjax_today()
        {
            $this->load->library('performance');
            $data['today_gree']      = $this->performance->today_green();
            $this->load->view('pjax_today', $data);
        }
        
        public function pjax_today_perf()
        {
            $this->load->library('performance');
            $data['pjax_today_perf']      = $this->performance->today_performance();
            $this->load->view('pjax_today_perf', $data);
        }
        
        public function pjax_today_total()
        {
            $this->load->library('performance');
            $data['today_total']    =   $this->performance->today();
            $data['today_red']      =   $this->performance->today_red();
            $this->load->view('pjax_today_total', $data);
        }
        
        public function pjax_test()
        {
            $this->load->library('performance');
            $data['todaytest']      = $this->performance->today_performance();
            $this->load->view('pjax_test', $data);
        }
        
}

/* End of file pajax.php */
/* Location: ./application/controllers/pajax.php */