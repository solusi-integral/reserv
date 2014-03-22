<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes extends CI_Controller {

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
            $this->load->helper('date');
            $data['date1']      = date("Hi", now());
            $data['dategmt']    = date("Hi", local_to_gmt(now()));
            $gmt                = local_to_gmt(now());
            $sydtz              = 'UP10';
            $dst                = TRUE;
            $timeb              = 1130;
            $timee              = 2400;
            $timeba             = 0000;
            $timeea             = 0030;
            $acttime            = date("Hi", gmt_to_local($gmt, $sydtz, $dst));
            $data['sydney']     = $acttime;
            if ($acttime >= $timeb and $acttime <= $timee){
                $data['bool']   = 'siang';
            }
            else if ($acttime >= $timeba and $acttime <= $timeea){
                $data['bool']   = 'malam';
            }
            else {
                $data['bool']   = 'not';
            }
            $this->load->view('tes', $data);
	}
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */