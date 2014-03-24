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
            } else if ($week == 18){
                $timeaa   = "2014W181";
                $timebb   = "2014W187";
            } else if ($week == 19){
                $timeaa   = "2014W191";
                $timebb   = "2014W197";
            } else if ($week == 20){
                $timeaa   = "2014W201";
                $timebb   = "2014W207";
            } else if ($week == 21){
                $timeaa   = "2014W211";
                $timebb   = "2014W217";
            } else if ($week == 22){
                $timeaa   = "2014W221";
                $timebb   = "2014W227";
            } else if ($week == 23){
                $timeaa   = "2014W231";
                $timebb   = "2014W237";
            } else if ($week == 24){
                $timeaa   = "2014W241";
                $timebb   = "2014W247";
            } else if ($week == 25){
                $timeaa   = "2014W251";
                $timebb   = "2014W257";
            } else if ($week == 26){
                $timeaa   = "2014W261";
                $timebb   = "2014W267";
            } else if ($week == 27){
                $timeaa   = "2014W271";
                $timebb   = "2014W277";
            } else if ($week == 28){
                $timeaa   = "2014W281";
                $timebb   = "2014W287";
            } else if ($week == 29){
                $timeaa   = "2014W291";
                $timebb   = "2014W297";
            } else if ($week == 30){
                $timeaa   = "2014W301";
                $timebb   = "2014W307";
            } else if ($week == 31){
                $timeaa   = "2014W311";
                $timebb   = "2014W317";
            } else if ($week == 32){
                $timeaa   = "2014W321";
                $timebb   = "2014W327";
            } else if ($week == 33){
                $timeaa   = "2014W331";
                $timebb   = "2014W337";
            } else if ($week == 34){
                $timeaa   = "2014W341";
                $timebb   = "2014W347";
            } else if ($week == 35){
                $timeaa   = "2014W351";
                $timebb   = "2014W357";
            } else if ($week == 36){
                $timeaa   = "2014W361";
                $timebb   = "2014W367";
            } else if ($week == 37){
                $timeaa   = "2014W371";
                $timebb   = "2014W377";
            } else if ($week == 38){
                $timeaa   = "2014W381";
                $timebb   = "2014W387";
            } else if ($week == 39){
                $timeaa   = "2014W391";
                $timebb   = "2014W397";
            } else if ($week == 40){
                $timeaa   = "2014W401";
                $timebb   = "2014W407";
            } else if ($week == 41){
                $timeaa   = "2014W411";
                $timebb   = "2014W417";
            } else if ($week == 42){
                $timeaa   = "2014W421";
                $timebb   = "2014W427";
            } else if ($week == 43){
                $timeaa   = "2014W431";
                $timebb   = "2014W437";
            } else if ($week == 44){
                $timeaa   = "2014W441";
                $timebb   = "2014W447";
            } else if ($week == 45){
                $timeaa   = "2014W451";
                $timebb   = "2014W457";
            } else if ($week == 46){
                $timeaa   = "2014W461";
                $timebb   = "2014W467";
            } else if ($week == 47){
                $timeaa   = "2014W471";
                $timebb   = "2014W477";
            } else if ($week == 48){
                $timeaa   = "2014W481";
                $timebb   = "2014W487";
            } else if ($week == 49){
                $timeaa   = "2014W491";
                $timebb   = "2014W497";
            } else if ($week == 50){
                $timeaa   = "2014W501";
                $timebb   = "2014W507";
            } else if ($week == 51){
                $timeaa   = "2014W511";
                $timebb   = "2014W517";
            } else if ($week == 52){
                $timeaa   = "2014W521";
                $timebb   = "2014W527";
            } else {
                show_error('Undefined week number');
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