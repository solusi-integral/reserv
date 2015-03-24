<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
            if ($status == 1){
                echo "Berhasil";
            }
            else {
                echo $status;
            }
            if ($race_type = 'G')
            {
                $status = $this->location_model->ginsert($race_type, $loc_name);
            }
            
            else if ($race_type = 'T'){
                $status = $this->location_model->tinsert($race_type, $loc_name);
            }
            else if ($race_type = 'R'){
                $status = $this->location_model->rinsert($race_type, $loc_name);
            }
            
        }
        
        public function data_race()
        {
            $gtype  = 'G';
            $ttype  = 'T';
            $rtype  = 'R';
            $jt_hour        = $this->input->post('jt_hour');
            $jt_min         = $this->input->post('jt_min');
            //Combining Jump time
            $jump           = $jt_hour.':'.$jt_min.':00';
            $race_type      = $this->input->post('race_type');
            $runners        = $this->input->post('runner');
            $race_number    = $this->input->post('race_number');
            $location       = $this->input->post('location');
            $perf           = $this->input->post('perf');
            
            $this->load->model('report_model');
            $data['jump_date']      = $jump;
            $data['type']           = $race_type;
            $data['runners']        = $runners;
            $data['number']         = $race_number;
            $data['location']       = $location;
            $data['results']        = $perf;
            $data['name']           = 'Indra';
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
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */