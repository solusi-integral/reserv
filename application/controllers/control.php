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
            //$data['twod_gree']  = $this->twodays_green();
            $this->load->view('index', $data);
	}
        
        function sumrace()
        {
            $this->load->helper('date');
            $this->load->model('report_model','',TRUE);
            $data    = $this->db->count_all_results('result');
            return $data;
        }
        
        function redrace()
        {
            $this->load->helper('date');
            $this->load->model('report_model','',TRUE);
            $now                = time();
            $UL                 = 1;
            $DL                 = 15;  
            $this->db->where('Results <', $UL);
            $this->db->or_where('Results >', $DL);
            $this->db->from('result');
            $red                = $this->db->count_all_results();
            $data               = $red;
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
            $this->load->helper('date');
            $this->load->model('report_model','',TRUE);
            $Gtype      = 'G';
            $this->db->where('Type =', $Gtype);
            $this->db->from('result');
            $Gtyper                = $this->db->count_all_results();
            return $Gtyper;          
        }
        
        function TType()
        {
            $this->load->helper('date');
            $this->load->model('report_model','',TRUE);
            $Ttype      = 'T';
            $this->db->where('Type =', $Ttype);
            $this->db->from('result');
            $Ttyper                = $this->db->count_all_results();
            return $Ttyper;
        }
        
        function RType()
        {
            $this->load->helper('date');
            $this->load->model('report_model','',TRUE);
            $Rtype      = 'R';
            $this->db->where('Type =', $Rtype);
            $this->db->from('result');
            $Rtyper                = $this->db->count_all_results();
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
            $this->load->helper('date');
            $time = now();
            $today  = date("Y-m-d", $time);
            $this->db->where('Date =', $today);
            $this->db->from('result');
            $today_total                = $this->db->count_all_results();
            return $today_total;
        }
        
        function today_red()
        {
            $this->load->helper('date');
            $time = now();
            $today  = date("Y-m-d", $time);
            $UL                 = 1;
            $DL                 = 15;  
            $this->db->where('Date =', $today);
            $this->db->where('Results <', $UL);
            $this->db->or_where('Results >', $DL);
            $this->db->from('result');
            $today_total                = $this->db->count_all_results();
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
            $this->db->or_where('Results >', $DL);
            $this->db->from('result');
            $today_total                = $this->db->count_all_results();
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
        /*
        function twodays()
        {
            $this->load->helper('date');
            $time = now();
            $today  = date("Y-m-d", $time - (60*60*24*2));
            $this->db->where('Date =', $today);
            $this->db->from('result');
            $today_total                = $this->db->count_all_results();
            return $today_total;
        }
        
        function twodays_red()
        {
            $this->load->helper('date');
            $time = now();
            $today  = date("Y-m-d", $time - (60*60*24*2));
            $UL                 = 1;
            $DL                 = 15;  
            $this->db->where('Date =', $today);
            $this->db->where('Results <', $UL);
            $this->db->or_where('Results >', $DL);
            $this->db->from('result');
            $today_total                = $this->db->count_all_results();
            $red    = $today_total;
            return $red;
        }
        
        function twodays_green()
        {
            $total  = $this->twodays();
            $red    = $this->twodays_red();
            $green  = $total-$red;
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
      */
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */