<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of Control
 * 
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */

class Control extends CI_Controller {

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
            $this->load->model('report_model','',TRUE);
            $this->load->library('performance');
            $data['sumrace']    = $this->performance->sumrace();
            $data['red']        = $this->performance->redrace();
            $data['perce']      = $this->performance->green_percentage();
            $data['gtype']      = $this->performance->GType();
            $data['ttype']      = $this->performance->TType();
            $data['rtype']      = $this->performance->RType();
            $data['pesan']      = $this->performance->status();
            $data['today_sum']  = $this->performance->today();
            $data['today_red']  = $this->performance->today_red();
            $data['today_perf'] = $this->performance->today_performance();
            $data['today_gree'] = $this->performance->today_green();
            $data['yeste_gree'] = $this->performance->yesterday_green();
            $data['twday_gree'] = $this->performance->twday_green();
            $data['thday_gree'] = $this->performance->thday_green();
            $data['frday_gree'] = $this->performance->frday_green();
            $data['last6']      = $this->performance->last6();
            $data['surya']      = $this->performance->individual_performance('surya');
            $data['azis']       = $this->performance->individual_performance('azis');
            $data['indra']      = $this->performance->individual_performance('indra');
            $this->load->view('index', $data);
	}
                
}

/* End of file control.php */
/* Location: ./application/controllers/control.php */
