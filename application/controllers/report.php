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
            $timeb              = 1200;
            $timee              = 2200;
            $timeba             = 0000;
            $timeea             = 0001;
            $gtype  = 'G';
            $ttype  = 'T';
            $rtype  = 'R';
            $acttime            = date("Hi", gmt_to_local($gmt, $sydtz, $dst));
            $actday             = date("D", gmt_to_local($gmt, $sydtz, $dst));
            if ($actday == "Sat")
            {
                $data['counted']    = 0;
            }
            if ($acttime >= $timeb and $acttime <= $timee){
                //Filter counted races  and uncounted races
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
            //$this->load->view('report_view',$data);
            $this->db->insert('result', $data);
            $id = $this->db->insert_id();
            $data2['race_id']        = $id;
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
            $this->__jsonoutput($data2);
        }
        
        private function __jsonoutput($data)
        {
            $this->output->set_content_type('application/json');
            $this->output->set_status_header('201');
            $this->output->set_output(json_encode($data));
            //$this->output->set_header("HTTP/1.0 200 OK");
            //$this->output->set_header("HTTP/1.1 200 OK");
            //$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
            //$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
            //$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
            //$this->output->set_header("Pragma: no-cache");
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
        
        // Please change it back to private function when you are done
        public function lookup30races($id)
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
            $query_01  = $this->__processrace($id_cur);
            $query_02  = $this->__processrace($id_01);
            $query_03  = $this->__processrace($id_02);
            $query_04  = $this->__processrace($id_03);
            $query_05  = $this->__processrace($id_04);
            $query_06  = $this->__processrace($id_05);
            $query_07  = $this->__processrace($id_06);
            $query_08  = $this->__processrace($id_07);
            $query_09  = $this->__processrace($id_08);
            $query_10  = $this->__processrace($id_09);
            $query_11  = $this->__processrace($id_10);
            $query_12  = $this->__processrace($id_11);
            $query_13  = $this->__processrace($id_12);
            $query_14  = $this->__processrace($id_13);
            $query_15  = $this->__processrace($id_14);
            $query_16  = $this->__processrace($id_15);
            $query_17  = $this->__processrace($id_16);
            $query_18  = $this->__processrace($id_17);
            $query_19  = $this->__processrace($id_18);
            $query_20  = $this->__processrace($id_19);
            $query_21  = $this->__processrace($id_20);
            $query_22  = $this->__processrace($id_21);
            $query_23  = $this->__processrace($id_22);
            $query_24  = $this->__processrace($id_23);
            $query_25  = $this->__processrace($id_24);
            $query_26  = $this->__processrace($id_25);
            $query_27  = $this->__processrace($id_26);
            $query_28  = $this->__processrace($id_27);
            $query_29  = $this->__processrace($id_28);
            $query_30  = $this->__processrace($id_29);
            $query_31  = $this->__processrace($id_30);
            
            $race['lima']       = $query_01 + $query_02 + $query_03 + $query_04 + $query_05;
            $race['sepuluh']    = $race05 + $query_06 + $query_07 + $query_08 + $query_09 + $query_10;
            $race['tigapuluh']  = $race10 + $query_11 + $query_12 + $query_13 + $query_14 + $query_15 + $query_16 + $query_17 + $query_18 + $query_19 + $query_20 + $query_21 + $query_22 + $query_23 + $query_24 + $query_25 + $query_26 + $query_27 + $query_28 + $query_29 + $query_30;

            print_r($race);
        }
        
        private function __processrace($id)
        {
            // Load Report_model helper
            $this->load->model('report_model');
            // Get race info based on race id
            $query  = $this->report_model->info_race($id);
            // Store result into $data variable
            $data   = $query->result();
            // Convert array into variable
            foreach ($data as $row) {
                $nama       = $row->Name;
                $counted    = $row->Counted;
            }
            
            // Determine whether we should sent alert based on race result
            // Only for those which are counted
            if ($counted == 1)
            {
                // Only for missed races
                if ($nama == 'none')
                {
                    $alert = 1;
                }
                
                else {
                    $alert = 0;
                }
            }
            else {
                $alert  = 0;
            }
            
            // Return boolean value to function caller
            return $alert;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */