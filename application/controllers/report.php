<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->view('welcome_message');
	}
        
        public function record($date, $jump_date, $type, $runners, $number, $location, $results, $name, $comment)
        {
            /**
             * API Calls from Remote
             * 
             * This method allows the performance report to be recorded to the database automatically.
             * It should be called via HTTPS
             * All variable must be present to avoid errors.
             * 
             * API Call URL: https://reserv.solusi-integral.co.id/index.php/report/record/DATE/JUMP_TIME/TYPE/RUNNERS/NUMBER/LOCATION/RESULT/NAME/COMMENT
             * API Call URL example: https://reserv.solusi-integral.co.id/index.php/report/record/20150803/161700/G/8/3/NORTHAM/7/INDRA/none
             * 
             * @var     int     $date       Format YYYYMMDD
             * @var     int     $jump_time  Format  HHMMSS. Must be URL Encoded.
             * @var     string  $type       Three option (R,T,G)
             * @var     int     $runners    Number of runners
             * @var     int     $number     Race Number
             * @var     string  $location   Location Name. Must be URL Encoded.
             * @var     int     $result     Click Result
             * @var     string  $comment    Race Comment . Must be URL Encoded.
             */
            $this->load->model('report_model','',TRUE);
            $this->load->helper('date');
            $gmt                = local_to_gmt(now());
            $sydtz              = 'UP10';
            $dst                = TRUE;
            $timeb              = 1130;
            $timee              = 2400;
            $timeba             = 0000;
            $timeea             = 0030;
            $gtype  = 'G';
            $ttype  = 'T';
            $rtype  = 'R';
            $acttime            = date("Hi", gmt_to_local($gmt, $sydtz, $dst));
            if ($acttime >= $timeb and $acttime <= $timee){
                //Filter counted races and uncounted races
                if ($type == $rtype)
                {
                    $data['counted']    = 0;
                } else{
                    if ($comment == 'Standing Start' or $comment == 'Standing_Start'){
                        $data['counted']    = 0;   
                    } else {
                        $data['counted']    = 1;
                    }
                }
            }
            else if ($acttime >= $timeba and $acttime <= $timeea){
                if ($type == $rtype)
                {
                    $data['counted']    = 0;
                } else{
                    if ($comment == 'Standing Start' or $comment == 'Standing_Start'){
                        $data['counted']    = 0;   
                    } else {
                        $data['counted']    = 1;
                    }
                }
            }
            else {
                $data['counted']    = 0;
            }
            $decode_time            = rawurldecode($jump_date);
            $data['date']           = $date;
            $data['jump_date']      = $decode_time;
            $data['type']           = $type;
            $data['runners']        = $runners;
            $data['number']         = $number;
            $data['location']       = rawurldecode(str_replace('_', '%20', $location));
            $data['results']        = $results;
            $data['name']           = $name;
            $data['comment']        = rawurldecode(str_replace('_', '%20', $comment));
            $this->load->view('report_view',$data);
            $this->db->insert('result', $data);
            $id = $this->db->insert_id();
            if ($type == $gtype) 
            {
                $this->db->insert('gtype', $data);
            }
            else if ($type == $ttype) 
            {
                $this->db->insert('ttype', $data);
            }
            else if ($type == $rtype)
            {
                $this->db->insert('rtype', $data);
            }
        }
        
        private function __mailonmissed5()
        {
            /**
             * Send Automated Email Notification When Missed 5 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address.
             */
        }
        
        private function __mailonmissed10()
        {
            /**
             * Send Automated Email Notification When Missed 10 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address.
             */
        }
        
        private function __mailonmissed30()
        {
            /**
             * Send Automated Email Notification When Missed 30 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address.
             */
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */