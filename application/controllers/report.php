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
            $this->load->model('report_model','',TRUE);
            $decode_time            = rawurldecode($jump_date);
            $data['date']           = $date;
            $data['jump_date']      = $decode_time;
            $data['type']           = $type;
            $data['runners']        = $runners;
            $data['number']         = $number;
            $data['location']       = rawurldecode($location);
            $data['results']        = $results;
            $data['name']           = $name;
            $data['comment']        = rawurldecode($comment);
            $this->load->view('report_view',$data);
            $this->db->insert('result', $data);
            $gtype  = 'G';
            $ttype  = 'T';
            $rtype  = 'R';
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */