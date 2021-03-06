<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Graph
 * 
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */

class Graphs extends CI_Controller {

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
            $data['total']      = $this->sumrace();
            $data['red']        = $this->redrace();
            $data['green']      = $this->green_percentage();
            $data['status']     = $this->status();
            $data['gtype']      = $this->GType();
            $data['rtype']      = $this->RType();
            $data['ttype']      = $this->TType();
            $data['azis']       = $this->individual_performance('azis');
            $data['surya']      = $this->individual_performance('surya');
            $data['indra']      = $this->individual_performance('indra');
            $this->load->view('graphs', $data);
	}
        
        function sumrace()
        {
            $this->load->model('report_model');
            $data       = $this->report_model->all_sum_race();
            return $data;
        }
        
        function redrace()
        {
            $this->load->model('report_model');
            $data               = $this->report_model->all_sum_redrace();
            return $data;
        }
        
        function green_percentage()
        {
            $all        = $this->sumrace();
            $red        = $this->redrace();
            $green      = $all-$red;
            $perce1     = round(($green/$all*100),2);
            return $perce1;
        }
        
        function GType()
        {
            $this->load->model('report_model');
            $Gtyper                = $this->report_model->all_gtype_sum_race();
            return $Gtyper;          
        }
        
        function TType()
        {
            $this->load->model('report_model');
            $Ttyper                = $this->report_model->all_ttype_sum_race();
            return $Ttyper;
        }
        
        function RType()
        {
            $this->load->model('report_model');
            $Rtyper                = $this->report_model->all_rtype_sum_race();
            return $Rtyper;
        }
        
        function status()
        {
            $status = $this->green_percentage();
            if ($status > 90){
                $pesan  = 'Great';
            }
            else if ($status > 80){
                $pesan  = 'Good';
            }
            else if ($status > 75){
                $pesan  = 'Fair';
            }
            else {
                $pesan  = 'Bad';
            }
            return $pesan; 
        }
        
        function today()
        {
            $this->load->model('report_model');
            $today_total                = $this->report_model->today_sum_race();
            return $today_total;
        }
        
        function today_red()
        {
            $this->load->model('report_model');
            $todayul         = $this->report_model->today_red_ul();
            $todaydl        = $this->report_model->today_red_dl();
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function today_green()
        {
            $total  = $this->today();
            $red    = $this->today_red();
            
            if ($red == 0)
            {
                $perce1 = 100;
            }
            else 
            {
                $green  = $total-$red;
                $perce1     = round(($green/$total*100),2);
            }
            return $perce1;
        }
        
        function today_performance()
        {
            $status = $this->today_green();
            if ($status > 90){
                $pesan  = 'Great';
            }
            else if ($status > 80){
                $pesan  = 'Good';
            }
            else if ($status > 75){
                $pesan  = 'Fair';
            }
            else {
                $pesan  = 'Bad';
            }
            return $pesan; 
        }
        
        function yesterday()
        {
            $this->load->model('report_model');
            $today_total    = $this->report_model->yesterday_sum_race();
            return $today_total;
        }
        
        function yesterday_red()
        {
            $this->load->model('report_model');
            $todayul         = $this->report_model->yesterday_red_ul();
            $todaydl        = $this->report_model->yesterday_red_dl();
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function yesterday_green()
        {
            $total  = $this->yesterday();
            $red    = $this->yesterday_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function twday_sum()
        {
            $this->load->model('report_model');
            $offset         = 3*60*60*24;
            $today_total    = $this->report_model->global_sum_race($offset);
            return $today_total;
        }
        
        function twday_red()
        {
            $this->load->model('report_model');
            $offset         = 3*60*60*24;
            $todayul        = $this->report_model->global_red_ul($offset);
            $todaydl        = $this->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function twday_green()
        {
            $total  = $this->twday_sum();
            $red    = $this->twday_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function thday_sum()
        {
            $this->load->model('report_model');
            $offset         = 4*60*60*24;
            $today_total    = $this->report_model->global_sum_race($offset);
            return $today_total;
        }
        
        function thday_red()
        {
            $this->load->model('report_model');
            $offset         = 4*60*60*24;
            $todayul        = $this->report_model->global_red_ul($offset);
            $todaydl        = $this->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function thday_green()
        {
            $total  = $this->thday_sum();
            $red    = $this->thday_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function frday_sum()
        {
            $this->load->model('report_model');
            $offset         = 5*60*60*24;
            $today_total    = $this->report_model->global_sum_race($offset);
            return $today_total;
        }
        
        function frday_red()
        {
            $this->load->model('report_model');
            $offset         = 5*60*60*24;
            $todayul        = $this->report_model->global_red_ul($offset);
            $todaydl        = $this->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function frday_green()
        {
            $total  = $this->frday_sum();
            $red    = $this->frday_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function last6()
        {
            $this->load->model('report_model');
            $data   = $this->report_model->get_races_6();
            return $data;
        }
        
        function individual_performance($name)
        {
            $this->load->model('report_model');
            $data   = $this->report_model->individual_performance($name);
            $all    = $this->sumrace();
            $green  = round($data/$all*100, 2);
            return $green;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */