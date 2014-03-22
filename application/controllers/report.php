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
                    $data['counted']    = 1;
                }
            }
            else if ($acttime >= $timeba and $acttime <= $timeea){
                $data['counted']    = 1;
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