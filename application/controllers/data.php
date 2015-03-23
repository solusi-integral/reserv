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
        
        public function add()
        {
            $this->load->view('data_add');
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */