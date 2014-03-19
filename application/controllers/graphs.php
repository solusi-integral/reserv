<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graphs extends CI_Controller {

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
            $data['total']      = $this->sumrace();
            $data['red']        = $this->redrace();
            $data['green']      = $this->green_percentage();
            $this->load->view('graphs', $data);
	}
        
        public function pjax_total()
        {
            $data['total']      = $this->sumrace();
            $data['red']        = $this->redrace();
            $data['green']      = $this->green_percentage();
            $this->load->view('graphs_pjax_total', $data);
        }
        
        function sumrace()
        {
            $this->load->model('report_model');
            $data       = $this->report_model->all_sum_race();
            return $data;
        }
        
        function redrace()
        {
            $this->load->model('report_model');
            $data               = $this->report_model->all_sum_redrace();
            return $data;
        }
        
        function green_percentage()
        {
            $all        = $this->sumrace();
            $red        = $this->redrace();
            $green      = $all-$red;
            $perce1     = round(($green/$all*100),2);
            return $perce1;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */