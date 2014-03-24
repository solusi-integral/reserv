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
            $timeaa   = "2014W121";
            $timebb   = "2014W127";
            $query      = $this->__get_weekly_total($timeaa, $timebb);
            $data['weekly']     = $query;
            $this->load->view('tes', $data);
	}
        
        private function __weekly($week)
        {
            if ($week == 1){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W021";
                $timebb   = "2014W027";
            } else if ($week == 3){
                $timeaa   = "2014W031";
                $timebb   = "2014W037";
            } else if ($week == 4){
                $timeaa   = "2014W041";
                $timebb   = "2014W047";
            } else if ($week == 5){
                $timeaa   = "2014W051";
                $timebb   = "2014W057";
            } else if ($week == 6){
                $timeaa   = "2014W061";
                $timebb   = "2014W067";
            } else if ($week == 7){
                $timeaa   = "2014W071";
                $timebb   = "2014W077";
            } else if ($week == 8){
                $timeaa   = "2014W081";
                $timebb   = "2014W087";
            } else if ($week == 9){
                $timeaa   = "2014W091";
                $timebb   = "2014W097";
            } else if ($week == 10){
                $timeaa   = "2014W101";
                $timebb   = "2014W107";
            } else if ($week == 11){
                $timeaa   = "2014W111";
                $timebb   = "2014W117";
            } else if ($week == 12){
                $timeaa   = "2014W121";
                $timebb   = "2014W127";
            } else if ($week == 13){
                $timeaa   = "2014W131";
                $timebb   = "2014W137";
            } else if ($week == 14){
                $timeaa   = "2014W131";
                $timebb   = "2014W137";
            } else if ($week == 15){
                $timeaa   = "2014W151";
                $timebb   = "2014W157";
            } else if ($week == 15){
                $timeaa   = "2014W151";
                $timebb   = "2014W157";
            } else if ($week == 16){
                $timeaa   = "2014W161";
                $timebb   = "2014W167";
            } else if ($week == 17){
                $timeaa   = "2014W171";
                $timebb   = "2014W177";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            }
        }
                
        private function __result_week_total($timeaa, $timebb)
        {
            $timeaa   = "2014W011";
            $timebb   = "2014W017";
            return $this->__get_weekly_total($timeaa, $timebb);
        }
        
        private function __result_week_red($timeaa, $timebb)
        {
            $timeaa     = "2014W011";
            $timebb     = "2014W017";
            $redul      = $this->__get_weekly_red_ul($timeaa, $timebb);
            $reddl      = $this->__get_weekly_red_dl($timeaa, $timebb);
            $redtotal   = $redul+$reddl;
            return $redtotal;
        }
        
        private function __result_week_green($timeaa, $timebb)
        {
            $green      = round(($this->__result_week_red()/$this->__result_week_total()*100), 2);
            return $green;
        }
        
        private function __get_weekly_total($timeaa, $timebb)
        {
            $this->load->model('report_model');
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance($timea, $timeb);
            return $query;
        }
        
        private function __get_weekly_red_ul($timeaa, $timebb)
        {
            $this->load->model('report_model');
            $begin  = "1";
            $end    = "7";
            $timeaa = $year . "W" . $week . $begin;
            $timebb = $year . "W" . $week . $begin;
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance_redul($timea, $timeb);
        }
        
        private function __get_weekly_red_dl($timeaa, $timebb)
        {
            $this->load->model('report_model');
            $begin  = "1";
            $end    = "7";
            $timeaa = $year . "W" . $week . $begin;
            $timebb = $year . "W" . $week . $begin;
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance_reddl($timea, $timeb);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */