<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
            $data['sumrace']    = $this->sumrace();
            $data['red']        = $this->redrace();
            $data['perce']      = $this->green_percentage();
            $data['gtype']      = $this->GType();
            $data['ttype']      = $this->TType();
            $data['rtype']      = $this->RType();
            $data['pesan']      = $this->status();
            $data['today_sum']  = $this->today();
            $data['today_red']  = $this->today_red();
            $data['today_perf'] = $this->today_performance();
            $data['today_gree'] = $this->today_green();
            $data['yeste_gree'] = $this->yesterday_green();
            $data['twday_gree'] = $this->twday_green();
            $data['thday_gree'] = $this->thday_green();
            $data['frday_gree'] = $this->frday_green();
            $data['last6']      = $this->last6();
            $this->load->view('index', $data);
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
        
        function _green_percentage()
        {
            $all        = $this->sumrace();
            $red        = $this->redrace();
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
        
        function _frday_red()
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
            $red    = $this->_frday_red();
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
