<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control extends CI_Controller {

	/**
	 * Index Page for Remote Reporting System Dashboard 
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/control
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
         * 
         * @package     Reserv
         * @author      CV Solusi Integral
         * @copyright   Copyright (c) 2014 CV Solusi Integral
         * @link http://www.solusi-integral.co.id CV Solusi Integral
	 */
	public function index()
	{
            /**
             * Index
             *
             * This is a route based class which allow other function to interact with view and model.
             * 
             * @data    mixed
             */
            $this->load->model('report_model','',TRUE);
            $data['sumrace']    = $this->_sumrace();
            $data['red']        = $this->_redrace();
            $data['perce']      = $this->_green_percentage();
            $data['gtype']      = $this->_GType();
            $data['ttype']      = $this->_TType();
            $data['rtype']      = $this->_RType();
            $data['pesan']      = $this->_status();
            $data['today_sum']  = $this->_today();
            $data['today_red']  = $this->_today_red();
            $data['today_perf'] = $this->_today_performance();
            $data['today_gree'] = $this->_today_green();
            $data['yeste_gree'] = $this->_yesterday_green();
            $data['twday_gree'] = $this->_twday_green();
            $data['thday_gree'] = $this->_thday_green();
            $data['frday_gree'] = $this->frday_green();
            $data['last6']      = $this->last6();
            $this->load->view('index', $data);
	}
        
        function _sumrace()
        {
            $this->load->model('report_model');
            $data       = $this->report_model->all_sum_race();
            return $data;
        }
        
        function _redrace()
        {
            $this->load->model('report_model');
            $data               = $this->report_model->all_sum_redrace();
            return $data;
        }
        
        function _green_percentage()
        {
            $all        = $this->sumrace();
            $red        = $this->_redrace();
            $green      = $all-$red;
            $perce1     = round(($green/$all*100),2);
            return $perce1;
        }
        
        function _GType()
        {
            $this->load->model('report_model');
            $Gtyper                = $this->report_model->all_gtype_sum_race();
            return $Gtyper;          
        }
        
        function _TType()
        {
            $this->load->model('report_model');
            $Ttyper                = $this->report_model->all_ttype_sum_race();
            return $Ttyper;
        }
        
        function _RType()
        {
            $this->load->model('report_model');
            $Rtyper                = $this->report_model->all_rtype_sum_race();
            return $Rtyper;
        }
        
        function _status()
        {
            $status = $this->_green_percentage();
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
        
        function _today()
        {
            $this->load->model('report_model');
            $today_total                = $this->report_model->today_sum_race();
            return $today_total;
        }
        
        function _today_red()
        {
            $this->load->model('report_model');
            $todayul         = $this->report_model->today_red_ul();
            $todaydl        = $this->report_model->today_red_dl();
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function _today_green()
        {
            $total  = $this->_today();
            $red    = $this->_today_red();
            
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
        
        function _today_performance()
        {
            $status = $this->_today_green();
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
        
        function _yesterday()
        {
            $this->load->model('report_model');
            $today_total    = $this->report_model->yesterday_sum_race();
            return $today_total;
        }
        
        function _yesterday_red()
        {
            $this->load->model('report_model');
            $todayul         = $this->report_model->yesterday_red_ul();
            $todaydl        = $this->report_model->yesterday_red_dl();
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function _yesterday_green()
        {
            $total  = $this->_yesterday();
            $red    = $this->_yesterday_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function _twday_sum()
        {
            $this->load->model('report_model');
            $offset         = 3*60*60*24;
            $today_total    = $this->report_model->global_sum_race($offset);
            return $today_total;
        }
        
        function _twday_red()
        {
            $this->load->model('report_model');
            $offset         = 3*60*60*24;
            $todayul        = $this->report_model->global_red_ul($offset);
            $todaydl        = $this->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function _twday_green()
        {
            $total  = $this->_twday_sum();
            $red    = $this->_twday_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function _thday_sum()
        {
            $this->load->model('report_model');
            $offset         = 4*60*60*24;
            $today_total    = $this->report_model->global_sum_race($offset);
            return $today_total;
        }
        
        function _thday_red()
        {
            $this->load->model('report_model');
            $offset         = 4*60*60*24;
            $todayul        = $this->report_model->global_red_ul($offset);
            $todaydl        = $this->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function _thday_green()
        {
            $total  = $this->_thday_sum();
            $red    = $this->_thday_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function _frday_sum()
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
            $total  = $this->_frday_sum();
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
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */