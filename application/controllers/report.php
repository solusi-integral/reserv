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
             * MandrillAPI to predefined email address. Placed insert this
             * controller because everytime there is remote API calls it should
             * be handled by this controller. Therefore, it is suitable for 
             * automated reporting. Why? When there is incoming report that's 
             * means remote server is functional.
             * Why we don't place it on pjax or something similar? Because those
             * function require at least one active visitor to make it works.
             * 
             * How does it works?
             * 
             * Everytime the remote server call this controller to enter a new 
             * data, @record function will get a unique ID for every valid data.
             * We use that unique ID to do backward lookup. How many? Depending 
             * on the required notification level.
             * 
             * Github Issue ID #11 
             */
        }
        
        private function __mailonmissed10()
        {
            /**
             * Send Automated Email Notification When Missed 5 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address. Placed insert this
             * controller because everytime there is remote API calls it should
             * be handled by this controller. Therefore, it is suitable for 
             * automated reporting. Why? When there is incoming report that's 
             * means remote server is functional.
             * Why we don't place it on pjax or something similar? Because those
             * function require at least one active visitor to make it works.
             * 
             * Github Issue ID #11
             * 
             * How does it works?
             * 
             * Everytime the remote server call this controller to enter a new 
             * data, @record function will get a unique ID for every valid data.
             * We use that unique ID to do backward lookup. How many? Depending 
             * on the required notification level.
             */
        }
        
        private function __mailonmissed30()
        {
            /**
             * Send Automated Email Notification When Missed 5 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address. Placed insert this
             * controller because everytime there is remote API calls it should
             * be handled by this controller. Therefore, it is suitable for 
             * automated reporting. Why? When there is incoming report that's 
             * means remote server is functional.
             * Why we don't place it on pjax or something similar? Because those
             * function require at least one active visitor to make it works.
             * 
             * Github Issue ID #11
             * 
             * How does it works?
             * 
             * Everytime the remote server call this controller to enter a new 
             * data, @record function will get a unique ID for every valid data.
             * We use that unique ID to do backward lookup. How many? Depending 
             * on the required notification level.
             */
        }
        
        private function __lookup30races($id)
        {
            // Load Report_model helper
            $this->load->model('report_model');
            
            // Get race ID for the last 30 races.
            $id_cur = $id;
            $id_01  = $id-1;
            $id_02  = $id-2;
            $id_03  = $id-3;
            $id_04  = $id-4;
            $id_05  = $id-5;
            $id_06  = $id-6;
            $id_07  = $id-7;
            $id_08  = $id-8;
            $id_09  = $id-9;
            $id_10  = $id-10;
            $id_11  = $id-11;
            $id_12  = $id-12;
            $id_13  = $id-13;
            $id_14  = $id-14;
            $id_15  = $id-15;
            $id_16  = $id-16;
            $id_17  = $id-17;
            $id_18  = $id-18;
            $id_19  = $id-19;
            $id_20  = $id-20;
            $id_21  = $id-21;
            $id_22  = $id-22;
            $id_23  = $id-23;
            $id_24  = $id-24;
            $id_25  = $id-25;
            $id_26  = $id-26;
            $id_27  = $id-27;
            $id_28  = $id-28;
            $id_29  = $id-29;
            $id_30  = $id-30;
            
            // Lookup data from database based on race id
            $query  = $this->report_model->info_race($id);
            $data['info']   = $query->result();
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */