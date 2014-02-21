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
        
        public function record($date, $jump_date, $type, $runners, $number, $location, $results, $comment)
        {
            $this->load->model('report_model','',TRUE);
            $data['date']           = $date;
            $data['jump_date']      = $jump_date;
            $data['type']           = $type;
            $data['runners']        = $runners;
            $data['number']         = $number;
            $data['location']       = $location;
            $data['results']        = $results;
            $data['comment']        = $comment;
            $this->load->view('report_view',$data);
            $this->db->insert('result', $data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */