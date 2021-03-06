<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Data
 * 
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */

class Data extends CI_Controller {

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
         * fixed error #1 #2 #3
	 */
	public function index()
	{
		$this->load->view('charts');
	}
        
        public function edit($id)
        {
            $this->load->model('report_model');
            $query  = $this->report_model->info_race($id);
            $data['info']   = $query->result();
            $this->load->view('data_edit', $data);
        }
        
        public function insert()
        {
            $rawdata    = $this->input->post();
            $race_id    = $this->input->post('data_id');
            $comment    = $this->input->post('comment');
            $data['race_id']   = $race_id;
            $data['comment']    = $comment;
            $this->load->view('data_post', $data);
            $this->load->model('report_model');
            $this->report_model->update_race($race_id, $comment);
        }
        
        public function add_loc()
        {
            //$this->load->view('form_loc');
            $this->load->helper('form') ;
            $this->load->view('form_loc');
                        
        }
        
        public function add_race()
        {
            //$this->load->view('data_add');
            $this->load->helper('form') ;
            $this->load->model('location_model');
            $query = $this->location_model->lookup();
            $data['location']   = $query->result();
            $this->load->view('form_test', $data);
        }
        
        public function data_add()
        {
            $loc_name   = strtoupper($this->input->post('loc_name'));
            $race_type  = $this->input->post('race_type');
            //Load Location Model
            $this->load->model('location_model');
            //Insert data to database via Location Model and get the result back.
            $status = $this->location_model->insert($race_type, $loc_name);
			//Filter result based on the previous rules.
            if ($status == 1){
                echo "Berhasil";
            }
            else {
                echo $status;
            }
			//Insert data into G type database instead of general database. This function allow us
			//to differentiate the performance for each and every type. 
            if ($race_type = 'G')
            {
				//Insert to database using model "location" with insert function
                $status = $this->location_model->ginsert($race_type, $loc_name);
            }
            
            else if ($race_type = 'T'){
				//Insert to database using model named "location" with standart insert function
                $status = $this->location_model->tinsert($race_type, $loc_name);
            }
            else if ($race_type = 'R'){
                $status = $this->location_model->rinsert($race_type, $loc_name);
            }
            
        }
        
        public function data_race()
        {
			// Load Model named "report"
            $this->load->model('report_model','',TRUE);
			// Load Date Helper
            $this->load->helper('date');
			// Set time and date zone to GMT
            $gmt                = local_to_gmt(now());
            // Sydney Timezone
            $sydtz              = 'UP10';
			// Sydney "daylight time zone"
            $dst                = TRUE;
			// Counting begin at 11.30 each day
            $timeb              = 1200;
			// Counting time end at 24.00 each day
            $timee              = 2000;
			
            $timeba             = 0000;
            $timeea             = 0030;
            // Devide places to different type to make it easier to do the statistics.
			$gtype  = 'G';
            $ttype  = 'T';
            $rtype  = 'R';
			// Relay the data from POST method form with value of 'jt_hour'
            $jt_hour        = $this->input->post('jt_hour');
			// Relay the data from POST method form with value of 'jt_min'
            $jt_min         = $this->input->post('jt_min');
            //Combining Jump time
            $jump           = $jt_hour.':'.$jt_min.':00';
            $race_type      = $this->input->post('race_type');
            $runners        = $this->input->post('runner');
            $race_number    = $this->input->post('race_number');
            $operator       = $this->input->post('data_oper');
            $location       = $this->input->post('location');
            $perf           = $this->input->post('perf');
            
            // Need to work on this to filter unwanted race (outside the working hours)
            // Yesterday Performance is not working #6
            // Changed from date('Y-m-d H:i:s', $gmt);
            // To date('Y-m-d', $gmt);
            $date                   = date('Y-m-d', $gmt);
            if ($runner = 0){
               $counted = 0;
                
            } 
            else if ($race_type == $rtype){
                $counted = 0;
            }
            
            else if ($race_type == $ttype){
                $counted = 1;
            }
            else if ($race_type == $gtype)
            {
                $counted = 1;
            }
            $data['counted']        = $counted;
            $data['date']           = $date;
            $data['jump_date']      = $jump;
            $data['type']           = $race_type;
            $data['runners']        = $runners;
            $data['number']         = $race_number;
            $data['location']       = $location;
            $data['results']        = $perf;
            $data['name']           = $operator;
            $data['comment']        = 'None';
            $query = $this->db->insert('result', $data);
            if ($race_type == $gtype) 
            {
                $this->db->insert('gtype', $data);
            }
            else if ($race_type == $ttype) 
            {
                $this->db->insert('ttype', $data);
            }
            else if ($race_type == $rtype)
            {
                $this->db->insert('rtype', $data);
            }
            echo '<a href=';echo $this->config->base_url(); echo 'data/add_race'; echo '>Add More</a>';
            
        }
}

/* End of file data.php */
/* Location: ./application/controllers/data.php */