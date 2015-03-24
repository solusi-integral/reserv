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
            $this->load->view('data_add');
        }
        
        public function data_add()
        {
            $loc_name   = strtoupper($this->input->post('loc_name'));
            $race_type  = $this->input->post('race_type');
            echo $race_type;
            echo $loc_name;
            $this->load->model('location_model');
            $status = $this->location_model->insert($race_type, $loc_name);
            echo $status;
            if ($race_type = 'G')
            {
                
            }
            
            else if ($race_type = 'T'){
                
            }
            else if ($race_type = 'R'){
                
            }
            
        }
        
        public function data_race()
        {
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */