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
            $this->load->helper('date');
            $this->load->model('report_model');
            $time = now();
            $today  = date("Y-m-d", $time);
            $UL                 = 1;
            $DL                 = 15;  
            $this->db->where('Date =', $today);
            $this->db->where('Results <', $UL);
            $this->db->from('result');
            $todayul         = $this->db->count_all_results();
            //$todayul         = $this->report_model->today_red_ul();
            $this->db->where('Date =', $today);
            $this->db->where('Results >', $DL);
            $this->db->from('result');
            $todaydl        = $this->db->count_all_results();
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function today_green()
        {
            $total  = $this->today();
            $red    = $this->today_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
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
        
        function today_last1()
        {
            $this->load->model('report_model','',TRUE);
            $this->db->select('Results');
            $query  = $this->db->get('result', 5);
            $row['ro1']   = $query->row(1);
            return $row;
        }
        
        function yesterday()
        {
            $this->load->helper('date');
            $time = now();
            $today  = date("Y-m-d", $time - 86400);
            $this->db->where('Date =', $today);
            $this->db->from('result');
            $today_total                = $this->db->count_all_results();
            return $today_total;
        }
        
        function yesterday_red()
        {
            $this->load->helper('date');
            $time = now();
            $today  = date("Y-m-d", $time - 86400);
            $UL                 = 1;
            $DL                 = 15;  
            $this->db->where('Date =', $today);
            $this->db->where('Results <', $UL);
            $this->db->from('result');
            $todayul         = $this->db->count_all_results();
            $this->db->where('Date =', $today);
            $this->db->where('Results >', $DL);
            $this->db->from('result');
            $todaydl        =$this->db->count_all_results();
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
        
        function last6()
        {
            $this->load->model('report_model');
            $data   = $this->report_model->get_races_6();
            return $data;
        }
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */