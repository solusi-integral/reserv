<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes extends CI_Controller {

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
            $this->load->model('report_model');
            $timeaa   = "2014W121";
            $timebb   = "2014W127";
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query      = $this->report_model->weekly_performance($timea, $timeb);
            $data['weekly']     = $query;
            $this->load->view('tes', $data);
	}
        
        private function __get_weekly_total($week, $year)
        {
            $this->load->model('report_model');
            $begin  = "1";
            $end    = "7";
            $timeaa = $year . "W" . $week . $begin;
            $timebb = $year . "W" . $week . $begin;
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $week   = "12";
            $year   = "2014";
            //$query  = $this->report_model->weekly_performance($datea, $dateb);
            $query      = $this->__get_weekly_total($week, $year);
            return $query;
        }
        
        private function __get_weekly_red_ul($week, $year)
        {
            $this->load->model('report_model');
            $begin  = "1";
            $end    = "7";
            $timeaa = $year . "W" . $week . $begin;
            $timebb = $year . "W" . $week . $begin;
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance_redul($datea, $dateb);
        }
        
        private function __get_weekly_red_dl($week, $year)
        {
            $this->load->model('report_model');
            $begin  = "1";
            $end    = "7";
            $timeaa = $year . "W" . $week . $begin;
            $timebb = $year . "W" . $week . $begin;
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance_reddl($datea, $dateb);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */