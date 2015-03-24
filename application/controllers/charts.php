<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Controller {

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
//            $this->load->view('includes/core/document_head_flot.php', $data);
            $this->load->view('charts');
            
	}
        
        public function get_chart_js()
        {
            $timeaa   = "2015W111";
//            $timebb   = "2015W117";
//            $query      = $this->__get_weekly_red_dl($timeaa, $timebb);
//            $data['reddl']     = $query;
//            $data['redul']        = $this->__get_weekly_red_ul($timeaa, $timebb);
//            $data['total']          = $this->__get_weekly_total($timeaa, $timebb);
            $minggu01           = $this->__result_week_green(1);
            $minggu02           = $this->__result_week_green(2);
            $minggu03           = $this->__result_week_green(3);
            $minggu04           = $this->__result_week_green(4);
            $minggu05           = $this->__result_week_green(5);
            $minggu06           = $this->__result_week_green(6);
            $minggu07           = $this->__result_week_green(7);
            $minggu08           = $this->__result_week_green(8);
            $minggu09           = $this->__result_week_green(9);
//            $minggu10           = $this->__result_week_green(10);
            $minggu10           = 0;
            $minggu11           = $this->__result_week_green(11);
            $minggu12           = $this->__result_week_green(12);
            $minggu13           = $this->__result_week_green(13);
            $minggu14           = $this->__result_week_green(14);
            $minggu15           = $this->__result_week_green(15);
            $minggu16           = $this->__result_week_green(16);
            $minggu17           = $this->__result_week_green(17);
            $minggu18           = $this->__result_week_green(18);
            $minggu19           = $this->__result_week_green(19);
            $minggu20           = $this->__result_week_green(20);
            $minggu21           = $this->__result_week_green(21);
            $minggu22           = $this->__result_week_green(22);
            $minggu23           = $this->__result_week_green(23);
            $minggu24           = $this->__result_week_green(24);
            $minggu25           = $this->__result_week_green(25);
            $minggu26           = $this->__result_week_green(26);
            $minggu27           = $this->__result_week_green(27);
            $minggu28           = $this->__result_week_green(28);
            $minggu29           = $this->__result_week_green(29);
            $minggu30           = $this->__result_week_green(30);
            $minggu31           = $this->__result_week_green(31);
            $minggu32           = $this->__result_week_green(32);
            $minggu33           = $this->__result_week_green(33);
            $minggu34           = $this->__result_week_green(34);
            $minggu35           = $this->__result_week_green(35);
            $minggu36           = $this->__result_week_green(36);
            $minggu37           = $this->__result_week_green(37);
            $minggu38           = $this->__result_week_green(38);
            $minggu39           = $this->__result_week_green(39);
            $minggu40           = $this->__result_week_green(40);
            $minggu41           = $this->__result_week_green(41);
            $minggu42           = $this->__result_week_green(42);
            $minggu43           = $this->__result_week_green(43);
            $minggu44           = $this->__result_week_green(44);
            $minggu45           = $this->__result_week_green(45);
            $minggu46           = $this->__result_week_green(46);
            $minggu47           = $this->__result_week_green(47);
            $minggu48           = $this->__result_week_green(48);
            $minggu49           = $this->__result_week_green(49);
            $minggu50           = $this->__result_week_green(50);
            $minggu51           = $this->__result_week_green(51);
            $minggu52           = $this->__result_week_green(52);
            
            $totalwk01           = $this->__result_week_total(1);
            $totalwk02           = $this->__result_week_total(2);
            $totalwk03           = $this->__result_week_total(3);
            $totalwk04           = $this->__result_week_total(4);
            $totalwk05           = $this->__result_week_total(5);
            $totalwk06           = $this->__result_week_total(6);
            $totalwk07           = $this->__result_week_total(7);
            $totalwk08           = $this->__result_week_total(8);
            $totalwk09           = $this->__result_week_total(9);
            $totalwk10           = $this->__result_week_total(10);
            $totalwk11           = $this->__result_week_total(11);
            $totalwk12           = $this->__result_week_total(12);
            $totalwk13           = $this->__result_week_total(13);
            $totalwk14           = $this->__result_week_total(14);
            $totalwk15           = $this->__result_week_total(15);
            $totalwk16           = $this->__result_week_total(16);
            $totalwk17           = $this->__result_week_total(17);
            $totalwk18           = $this->__result_week_total(18);
            $totalwk19           = $this->__result_week_total(19);
            $totalwk20           = $this->__result_week_total(20);
            $totalwk21           = $this->__result_week_total(21);
            $totalwk22           = $this->__result_week_total(22);
            $totalwk23           = $this->__result_week_total(23);
            $totalwk24           = $this->__result_week_total(24);
            $totalwk25           = $this->__result_week_total(25);
            $totalwk26           = $this->__result_week_total(26);
            $totalwk27           = $this->__result_week_total(27);
            $totalwk28           = $this->__result_week_total(28);
            $totalwk29           = $this->__result_week_total(29);
            $totalwk30           = $this->__result_week_total(30);
            $totalwk31           = $this->__result_week_total(31);
            $totalwk32           = $this->__result_week_total(32);
            $totalwk33           = $this->__result_week_total(33);
            $totalwk34           = $this->__result_week_total(34);
            $totalwk35           = $this->__result_week_total(35);
            $totalwk36           = $this->__result_week_total(36);
            $totalwk37           = $this->__result_week_total(37);
            $totalwk38           = $this->__result_week_total(38);
            $totalwk39           = $this->__result_week_total(39);
            $totalwk40           = $this->__result_week_total(40);
            $totalwk41           = $this->__result_week_total(41);
            $totalwk42           = $this->__result_week_total(42);
            $totalwk43           = $this->__result_week_total(43);
            $totalwk44           = $this->__result_week_total(44);
            $totalwk45           = $this->__result_week_total(45);
            $totalwk46           = $this->__result_week_total(46);
            $totalwk47           = $this->__result_week_total(47);
            $totalwk48           = $this->__result_week_total(48);
            $totalwk49           = $this->__result_week_total(49);
            $totalwk50           = $this->__result_week_total(50);
            $totalwk51           = $this->__result_week_total(51);
            $totalwk52           = $this->__result_week_total(52);
            
//            $data['hasil']      = $hasil;
            $data1[]            = array(1, $minggu01);
            $data1[]            = array(2, $minggu02);
            $data1[]            = array(3, $minggu03);
            $data1[]            = array(4, $minggu04);
            $data1[]            = array(5, $minggu05);
            $data1[]            = array(6, $minggu06);
            $data1[]            = array(7, $minggu07);
            $data1[]            = array(8, $minggu08);
            $data1[]            = array(9, $minggu09);
            $data1[]            = array(10, $minggu10);
            $data1[]            = array(11, $minggu11);
            $data1[]            = array(12, $minggu12);
            $data1[]            = array(13, $minggu13);
            $data1[]            = array(14, $minggu14);
            $data1[]            = array(15, $minggu15);
            $data1[]            = array(16, $minggu16);
            $data1[]            = array(17, $minggu17);
            $data1[]            = array(18, $minggu18);
            $data1[]            = array(19, $minggu19);
            $data1[]            = array(20, $minggu20);
            $data1[]            = array(21, $minggu21);
            $data1[]            = array(22, $minggu22);
            $data1[]            = array(23, $minggu23);
            $data1[]            = array(24, $minggu24);
            $data1[]            = array(25, $minggu25);
            $data1[]            = array(26, $minggu26);
            $data1[]            = array(27, $minggu27);
            $data1[]            = array(28, $minggu28);
            $data1[]            = array(29, $minggu29);
            $data1[]            = array(30, $minggu30);
            $data1[]            = array(31, $minggu31);
            $data1[]            = array(32, $minggu32);
            $data1[]            = array(33, $minggu33);
            $data1[]            = array(34, $minggu34);
            $data1[]            = array(35, $minggu35);
            $data1[]            = array(36, $minggu36);
            $data1[]            = array(37, $minggu37);
            $data1[]            = array(38, $minggu38);
            $data1[]            = array(39, $minggu39);
            $data1[]            = array(40, $minggu40);
            $data1[]            = array(41, $minggu41);
            $data1[]            = array(42, $minggu42);
            $data1[]            = array(43, $minggu43);
            $data1[]            = array(44, $minggu44);
            $data1[]            = array(45, $minggu45);
            $data1[]            = array(46, $minggu46);
            $data1[]            = array(47, $minggu47);
            $data1[]            = array(48, $minggu48);
            $data1[]            = array(49, $minggu49);
            $data1[]            = array(50, $minggu50);
            $data1[]            = array(51, $minggu51);
            $data1[]            = array(52, $minggu52);
            /*$mergeData[]        = array(
                'label' => "Weekly Result",
                'result'  => $data1,
                'color' => '#6bcadb'
            );*/
            
            $target             = 75;
            $data2[]            = array(1, $target);
            $data2[]            = array(2, $target);
            $data2[]            = array(3, $target);
            $data2[]            = array(4, $target);
            $data2[]            = array(5, $target);
            $data2[]            = array(6, $target);
            $data2[]            = array(7, $target);
            $data2[]            = array(8, $target);
            $data2[]            = array(9, $target);
            $data2[]            = array(10, $target);
            $data2[]            = array(11, $target);
            $data2[]            = array(12, $target);
            $data2[]            = array(13, $target);
            $data2[]            = array(14, $target);
            $data2[]            = array(15, $target);
            $data2[]            = array(16, $target);
            $data2[]            = array(17, $target);
            $data2[]            = array(18, $target);
            $data2[]            = array(19, $target);
            $data2[]            = array(20, $target);
            $data2[]            = array(21, $target);
            $data2[]            = array(22, $target);
            $data2[]            = array(23, $target);
            $data2[]            = array(24, $target);
            $data2[]            = array(25, $target);
            $data2[]            = array(26, $target);
            $data2[]            = array(27, $target);
            $data2[]            = array(28, $target);
            $data2[]            = array(29, $target);
            $data2[]            = array(30, $target);
            $data2[]            = array(31, $target);
            $data2[]            = array(32, $target);
            $data2[]            = array(33, $target);
            $data2[]            = array(34, $target);
            $data2[]            = array(35, $target);
            $data2[]            = array(36, $target);
            $data2[]            = array(37, $target);
            $data2[]            = array(38, $target);
            $data2[]            = array(39, $target);
            $data2[]            = array(40, $target);
            $data2[]            = array(41, $target);
            $data2[]            = array(42, $target);
            $data2[]            = array(43, $target);
            $data2[]            = array(44, $target);
            $data2[]            = array(45, $target);
            $data2[]            = array(46, $target);
            $data2[]            = array(47, $target);
            $data2[]            = array(48, $target);
            $data2[]            = array(49, $target);
            $data2[]            = array(50, $target);
            $data2[]            = array(51, $target);
            $data2[]            = array(52, $target);
            /*$mergeData[]        = array(
                'label' => "Target",
                'target'  => $data2,
                'color' => '#6db000'
            );*/
            
            			$data3[]            = array(1, $totalwk01);
            $data3[]            = array(2, $totalwk02);
            $data3[]            = array(3, $totalwk03);
            $data3[]            = array(4, $totalwk04);
            $data3[]            = array(5, $totalwk05);
            $data3[]            = array(6, $totalwk06);
            $data3[]            = array(7, $totalwk07);
            $data3[]            = array(8, $totalwk08);
            $data3[]            = array(9, $totalwk09);
            $data3[]            = array(10, $totalwk10);
            $data3[]            = array(11, $totalwk11);
            $data3[]            = array(12, $totalwk12);
            $data3[]            = array(13, $totalwk13);
            $data3[]            = array(14, $totalwk14);
            $data3[]            = array(15, $totalwk15);
            $data3[]            = array(16, $totalwk16);
            $data3[]            = array(17, $totalwk17);
            $data3[]            = array(18, $totalwk18);
            $data3[]            = array(19, $totalwk19);
            $data3[]            = array(20, $totalwk20);
            $data3[]            = array(21, $totalwk21);
            $data3[]            = array(22, $totalwk22);
            $data3[]            = array(23, $totalwk23);
            $data3[]            = array(24, $totalwk24);
            $data3[]            = array(25, $totalwk25);
            $data3[]            = array(26, $totalwk26);
            $data3[]            = array(27, $totalwk27);
            $data3[]            = array(28, $totalwk28);
            $data3[]            = array(29, $totalwk29);
            $data3[]            = array(30, $totalwk30);
            $data3[]            = array(31, $totalwk31);
            $data3[]            = array(32, $totalwk32);
            $data3[]            = array(33, $totalwk33);
            $data3[]            = array(34, $totalwk34);
            $data3[]            = array(35, $totalwk35);
            $data3[]            = array(36, $totalwk36);
            $data3[]            = array(37, $totalwk37);
            $data3[]            = array(38, $totalwk38);
            $data3[]            = array(39, $totalwk39);
            $data3[]            = array(40, $totalwk40);
            $data3[]            = array(41, $totalwk41);
            $data3[]            = array(42, $totalwk42);
            $data3[]            = array(43, $totalwk43);
            $data3[]            = array(44, $totalwk44);
            $data3[]            = array(45, $totalwk45);
            $data3[]            = array(46, $totalwk46);
            $data3[]            = array(47, $totalwk47);
            $data3[]            = array(48, $totalwk48);
            $data3[]            = array(49, $totalwk49);
            $data3[]            = array(50, $totalwk50);
            $data3[]            = array(51, $totalwk51);
            $data3[]            = array(52, $totalwk52);
            
            $data['array']      = $data1;
            $data['array2']     = $data2;
            $data['weekly']     = $data3;
            $this->load->view('adminica_flot', $data);
        }
        
        public function get_json()
        {
            $minggu01           = $this->__result_week_green(1);
            $minggu02           = $this->__result_week_green(2);
            $minggu03           = $this->__result_week_green(3);
            $minggu04           = $this->__result_week_green(4);
            $minggu05           = $this->__result_week_green(5);
            $minggu06           = $this->__result_week_green(6);
            $minggu07           = $this->__result_week_green(7);
            $minggu08           = $this->__result_week_green(8);
            $minggu09           = $this->__result_week_green(9);
//            $minggu10           = $this->__result_week_green(10);
            $minggu10           = 100;
            $minggu11           = $this->__result_week_green(11);
            $minggu12           = $this->__result_week_green(12);
            $minggu13           = $this->__result_week_green(13);
            $minggu14           = $this->__result_week_green(14);
            $minggu15           = $this->__result_week_green(15);
            $minggu16           = $this->__result_week_green(16);
            $minggu17           = $this->__result_week_green(17);
            $minggu18           = $this->__result_week_green(18);
            $minggu19           = $this->__result_week_green(19);
            $minggu20           = $this->__result_week_green(20);
            $minggu21           = $this->__result_week_green(21);
            $minggu22           = $this->__result_week_green(22);
            $minggu23           = $this->__result_week_green(23);
            $minggu24           = $this->__result_week_green(24);
            $minggu25           = $this->__result_week_green(25);
            $minggu26           = $this->__result_week_green(26);
            $minggu27           = $this->__result_week_green(27);
            $minggu28           = $this->__result_week_green(28);
            $minggu29           = $this->__result_week_green(29);
            $minggu30           = $this->__result_week_green(30);
            $minggu31           = $this->__result_week_green(31);
            $minggu32           = $this->__result_week_green(32);
            $minggu33           = $this->__result_week_green(33);
            $minggu34           = $this->__result_week_green(34);
            $minggu35           = $this->__result_week_green(35);
            $minggu36           = $this->__result_week_green(36);
            $minggu37           = $this->__result_week_green(37);
            $minggu38           = $this->__result_week_green(38);
            $minggu39           = $this->__result_week_green(39);
            $minggu40           = $this->__result_week_green(40);
            $minggu41           = $this->__result_week_green(41);
            $minggu42           = $this->__result_week_green(42);
            $minggu43           = $this->__result_week_green(43);
            $minggu44           = $this->__result_week_green(44);
            $minggu45           = $this->__result_week_green(45);
            $minggu46           = $this->__result_week_green(46);
            $minggu47           = $this->__result_week_green(47);
            $minggu48           = $this->__result_week_green(48);
            $minggu49           = $this->__result_week_green(49);
            $minggu50           = $this->__result_week_green(50);
            $minggu51           = $this->__result_week_green(51);
            $minggu52           = $this->__result_week_green(52);
            
            $totalwk01           = $this->__result_week_total(1);
            $totalwk02           = $this->__result_week_total(2);
            $totalwk03           = $this->__result_week_total(3);
            $totalwk04           = $this->__result_week_total(4);
            $totalwk05           = $this->__result_week_total(5);
            $totalwk06           = $this->__result_week_total(6);
            $totalwk07           = $this->__result_week_total(7);
            $totalwk08           = $this->__result_week_total(8);
            $totalwk09           = $this->__result_week_total(9);
            $totalwk10           = $this->__result_week_total(10);
            $totalwk11           = $this->__result_week_total(11);
            $totalwk12           = $this->__result_week_total(12);
            $totalwk13           = $this->__result_week_total(13);
            $totalwk14           = $this->__result_week_total(14);
            $totalwk15           = $this->__result_week_total(15);
            $totalwk16           = $this->__result_week_total(16);
            $totalwk17           = $this->__result_week_total(17);
            $totalwk18           = $this->__result_week_total(18);
            $totalwk19           = $this->__result_week_total(19);
            $totalwk20           = $this->__result_week_total(20);
            $totalwk21           = $this->__result_week_total(21);
            $totalwk22           = $this->__result_week_total(22);
            $totalwk23           = $this->__result_week_total(23);
            $totalwk24           = $this->__result_week_total(24);
            $totalwk25           = $this->__result_week_total(25);
            $totalwk26           = $this->__result_week_total(26);
            $totalwk27           = $this->__result_week_total(27);
            $totalwk28           = $this->__result_week_total(28);
            $totalwk29           = $this->__result_week_total(29);
            $totalwk30           = $this->__result_week_total(30);
            $totalwk31           = $this->__result_week_total(31);
            $totalwk32           = $this->__result_week_total(32);
            $totalwk33           = $this->__result_week_total(33);
            $totalwk34           = $this->__result_week_total(34);
            $totalwk35           = $this->__result_week_total(35);
            $totalwk36           = $this->__result_week_total(36);
            $totalwk37           = $this->__result_week_total(37);
            $totalwk38           = $this->__result_week_total(38);
            $totalwk39           = $this->__result_week_total(39);
            $totalwk40           = $this->__result_week_total(40);
            $totalwk41           = $this->__result_week_total(41);
            $totalwk42           = $this->__result_week_total(42);
            $totalwk43           = $this->__result_week_total(43);
            $totalwk44           = $this->__result_week_total(44);
            $totalwk45           = $this->__result_week_total(45);
            $totalwk46           = $this->__result_week_total(46);
            $totalwk47           = $this->__result_week_total(47);
            $totalwk48           = $this->__result_week_total(48);
            $totalwk49           = $this->__result_week_total(49);
            $totalwk50           = $this->__result_week_total(50);
            $totalwk51           = $this->__result_week_total(51);
            $totalwk52           = $this->__result_week_total(52);
//            $data['hasil']      = $hasil;
            $data1[]            = array(1, $minggu01);
            $data1[]            = array(2, $minggu02);
            $data1[]            = array(3, $minggu03);
            $data1[]            = array(4, $minggu04);
            $data1[]            = array(5, $minggu05);
            $data1[]            = array(6, $minggu06);
            $data1[]            = array(7, $minggu07);
            $data1[]            = array(8, $minggu08);
            $data1[]            = array(9, $minggu09);
            $data1[]            = array(10, $minggu10);
            $data1[]            = array(11, $minggu11);
            $data1[]            = array(12, $minggu12);
            $data1[]            = array(13, $minggu13);
            $data1[]            = array(14, $minggu14);
            $data1[]            = array(15, $minggu15);
            $data1[]            = array(16, $minggu16);
            $data1[]            = array(17, $minggu17);
            $data1[]            = array(18, $minggu18);
            $data1[]            = array(19, $minggu19);
            $data1[]            = array(20, $minggu20);
            $data1[]            = array(21, $minggu21);
            $data1[]            = array(22, $minggu22);
            $data1[]            = array(23, $minggu23);
            $data1[]            = array(24, $minggu24);
            $data1[]            = array(25, $minggu25);
            $data1[]            = array(26, $minggu26);
            $data1[]            = array(27, $minggu27);
            $data1[]            = array(28, $minggu28);
            $data1[]            = array(29, $minggu29);
            $data1[]            = array(30, $minggu30);
            $data1[]            = array(31, $minggu31);
            $data1[]            = array(32, $minggu32);
            $data1[]            = array(33, $minggu33);
            $data1[]            = array(34, $minggu34);
            $data1[]            = array(35, $minggu35);
            $data1[]            = array(36, $minggu36);
            $data1[]            = array(37, $minggu37);
            $data1[]            = array(38, $minggu38);
            $data1[]            = array(39, $minggu39);
            $data1[]            = array(40, $minggu40);
            $data1[]            = array(41, $minggu41);
            $data1[]            = array(42, $minggu42);
            $data1[]            = array(43, $minggu43);
            $data1[]            = array(44, $minggu44);
            $data1[]            = array(45, $minggu45);
            $data1[]            = array(46, $minggu46);
            $data1[]            = array(47, $minggu47);
            $data1[]            = array(48, $minggu48);
            $data1[]            = array(49, $minggu49);
            $data1[]            = array(50, $minggu50);
            $data1[]            = array(51, $minggu51);
            $data1[]            = array(52, $minggu52);
            $mergeData[]        = array(
                'label' => "Weekly Result",
                'result'  => $data1,
                'color' => '#6bcadb'
            );
            
            $target             = 75;
            $data2[]            = array(1, $target);
            $data2[]            = array(2, $target);
            $data2[]            = array(3, $target);
            $data2[]            = array(4, $target);
            $data2[]            = array(5, $target);
            $data2[]            = array(6, $target);
            $data2[]            = array(7, $target);
            $data2[]            = array(8, $target);
            $data2[]            = array(9, $target);
            $data2[]            = array(10, $target);
            $data2[]            = array(11, $target);
            $data2[]            = array(12, $target);
            $data2[]            = array(13, $target);
            $data2[]            = array(14, $target);
            $data2[]            = array(15, $target);
            $data2[]            = array(16, $target);
            $data2[]            = array(17, $target);
            $data2[]            = array(18, $target);
            $data2[]            = array(19, $target);
            $data2[]            = array(20, $target);
            $data2[]            = array(21, $target);
            $data2[]            = array(22, $target);
            $data2[]            = array(23, $target);
            $data2[]            = array(24, $target);
            $data2[]            = array(25, $target);
            $data2[]            = array(26, $target);
            $data2[]            = array(27, $target);
            $data2[]            = array(28, $target);
            $data2[]            = array(29, $target);
            $data2[]            = array(30, $target);
            $data2[]            = array(31, $target);
            $data2[]            = array(32, $target);
            $data2[]            = array(33, $target);
            $data2[]            = array(34, $target);
            $data2[]            = array(35, $target);
            $data2[]            = array(36, $target);
            $data2[]            = array(37, $target);
            $data2[]            = array(38, $target);
            $data2[]            = array(39, $target);
            $data2[]            = array(40, $target);
            $data2[]            = array(41, $target);
            $data2[]            = array(42, $target);
            $data2[]            = array(43, $target);
            $data2[]            = array(44, $target);
            $data2[]            = array(45, $target);
            $data2[]            = array(46, $target);
            $data2[]            = array(47, $target);
            $data2[]            = array(48, $target);
            $data2[]            = array(49, $target);
            $data2[]            = array(50, $target);
            $data2[]            = array(51, $target);
            $data2[]            = array(52, $target);
            $mergeData[]        = array(
                'label' => "Target",
                'target'  => $data2,
                'color' => '#6db000'
            );
            
            $data3[]            = array(1, $totalwk01);
            $data3[]            = array(2, $totalwk02);
            $data3[]            = array(3, $totalwk03);
            $data3[]            = array(4, $totalwk04);
            $data3[]            = array(5, $totalwk05);
            $data3[]            = array(6, $totalwk06);
            $data3[]            = array(7, $totalwk07);
            $data3[]            = array(8, $totalwk08);
            $data3[]            = array(9, $totalwk09);
            $data3[]            = array(10, $totalwk10);
            $data3[]            = array(11, $totalwk11);
            $data3[]            = array(12, $totalwk12);
            $data3[]            = array(13, $totalwk13);
            $data3[]            = array(14, $totalwk14);
            $data3[]            = array(15, $totalwk15);
            $data3[]            = array(16, $totalwk16);
            $data3[]            = array(17, $totalwk17);
            $data3[]            = array(18, $totalwk18);
            $data3[]            = array(19, $totalwk19);
            $data3[]            = array(20, $totalwk20);
            $data3[]            = array(21, $totalwk21);
            $data3[]            = array(22, $totalwk22);
            $data3[]            = array(23, $totalwk23);
            $data3[]            = array(24, $totalwk24);
            $data3[]            = array(25, $totalwk25);
            $data3[]            = array(26, $totalwk26);
            $data3[]            = array(27, $totalwk27);
            $data3[]            = array(28, $totalwk28);
            $data3[]            = array(29, $totalwk29);
            $data3[]            = array(30, $totalwk30);
            $data3[]            = array(31, $totalwk31);
            $data3[]            = array(32, $totalwk32);
            $data3[]            = array(33, $totalwk33);
            $data3[]            = array(34, $totalwk34);
            $data3[]            = array(35, $totalwk35);
            $data3[]            = array(36, $totalwk36);
            $data3[]            = array(37, $totalwk37);
            $data3[]            = array(38, $totalwk38);
            $data3[]            = array(39, $totalwk39);
            $data3[]            = array(40, $totalwk40);
            $data3[]            = array(41, $totalwk41);
            $data3[]            = array(42, $totalwk42);
            $data3[]            = array(43, $totalwk43);
            $data3[]            = array(44, $totalwk44);
            $data3[]            = array(45, $totalwk45);
            $data3[]            = array(46, $totalwk46);
            $data3[]            = array(47, $totalwk47);
            $data3[]            = array(48, $totalwk48);
            $data3[]            = array(49, $totalwk49);
            $data3[]            = array(50, $totalwk50);
            $data3[]            = array(51, $totalwk51);
            $data3[]            = array(52, $totalwk52);
            
            $data['array2']     = $mergeData;
            $this->load->view('weekly', $data);
        }
                
        private function __result_week_total($week)
        {
            if ($week == 1){
                $timeaa   = "2015W011";
                $timebb   = "2015W017";
            } else if ($week == 2){
                $timeaa   = "2015W021";
                $timebb   = "2015W027";
            } else if ($week == 3){
                $timeaa   = "2015W031";
                $timebb   = "2015W037";
            } else if ($week == 4){
                $timeaa   = "2015W041";
                $timebb   = "2015W047";
            } else if ($week == 5){
                $timeaa   = "2015W051";
                $timebb   = "2015W057";
            } else if ($week == 6){
                $timeaa   = "2015W061";
                $timebb   = "2015W067";
            } else if ($week == 7){
                $timeaa   = "2015W071";
                $timebb   = "2015W077";
            } else if ($week == 8){
                $timeaa   = "2015W081";
                $timebb   = "2015W087";
            } else if ($week == 9){
                $timeaa   = "2015W091";
                $timebb   = "2015W097";
            } else if ($week == 10){
                $timeaa   = "2015W101";
                $timebb   = "2015W107";
            } else if ($week == 11){
                $timeaa   = "2015W111";
                $timebb   = "2015W117";
            } else if ($week == 12){
                $timeaa   = "2015W121";
                $timebb   = "2015W127";
            } else if ($week == 13){
                $timeaa   = "2015W131";
                $timebb   = "2015W137";
            } else if ($week == 14){
                $timeaa   = "2015W141";
                $timebb   = "2015W147";
            } else if ($week == 15){
                $timeaa   = "2015W151";
                $timebb   = "2015W157";
            } else if ($week == 16){
                $timeaa   = "2015W161";
                $timebb   = "2015W167";
            } else if ($week == 17){
                $timeaa   = "2015W171";
                $timebb   = "2015W177";
            } else if ($week == 18){
                $timeaa   = "2015W181";
                $timebb   = "2015W187";
            } else if ($week == 19){
                $timeaa   = "2015W191";
                $timebb   = "2015W197";
            } else if ($week == 20){
                $timeaa   = "2015W201";
                $timebb   = "2015W207";
            } else if ($week == 21){
                $timeaa   = "2015W211";
                $timebb   = "2015W217";
            } else if ($week == 22){
                $timeaa   = "2015W221";
                $timebb   = "2015W227";
            } else if ($week == 23){
                $timeaa   = "2015W231";
                $timebb   = "2015W237";
            } else if ($week == 24){
                $timeaa   = "2015W241";
                $timebb   = "2015W247";
            } else if ($week == 25){
                $timeaa   = "2015W251";
                $timebb   = "2015W257";
            } else if ($week == 26){
                $timeaa   = "2015W261";
                $timebb   = "2015W267";
            } else if ($week == 27){
                $timeaa   = "2015W271";
                $timebb   = "2015W277";
            } else if ($week == 28){
                $timeaa   = "2015W281";
                $timebb   = "2015W287";
            } else if ($week == 29){
                $timeaa   = "2015W291";
                $timebb   = "2015W297";
            } else if ($week == 30){
                $timeaa   = "2015W301";
                $timebb   = "2015W307";
            } else if ($week == 31){
                $timeaa   = "2015W311";
                $timebb   = "2015W317";
            } else if ($week == 32){
                $timeaa   = "2015W321";
                $timebb   = "2015W327";
            } else if ($week == 33){
                $timeaa   = "2015W331";
                $timebb   = "2015W337";
            } else if ($week == 34){
                $timeaa   = "2015W341";
                $timebb   = "2015W347";
            } else if ($week == 35){
                $timeaa   = "2015W351";
                $timebb   = "2015W357";
            } else if ($week == 36){
                $timeaa   = "2015W361";
                $timebb   = "2015W367";
            } else if ($week == 37){
                $timeaa   = "2015W371";
                $timebb   = "2015W377";
            } else if ($week == 38){
                $timeaa   = "2015W381";
                $timebb   = "2015W387";
            } else if ($week == 39){
                $timeaa   = "2015W391";
                $timebb   = "2015W397";
            } else if ($week == 40){
                $timeaa   = "2015W401";
                $timebb   = "2015W407";
            } else if ($week == 41){
                $timeaa   = "2015W411";
                $timebb   = "2015W417";
            } else if ($week == 42){
                $timeaa   = "2015W421";
                $timebb   = "2015W427";
            } else if ($week == 43){
                $timeaa   = "2015W431";
                $timebb   = "2015W437";
            } else if ($week == 44){
                $timeaa   = "2015W441";
                $timebb   = "2015W447";
            } else if ($week == 45){
                $timeaa   = "2015W451";
                $timebb   = "2015W457";
            } else if ($week == 46){
                $timeaa   = "2015W461";
                $timebb   = "2015W467";
            } else if ($week == 47){
                $timeaa   = "2015W471";
                $timebb   = "2015W477";
            } else if ($week == 48){
                $timeaa   = "2015W481";
                $timebb   = "2015W487";
            } else if ($week == 49){
                $timeaa   = "2015W491";
                $timebb   = "2015W497";
            } else if ($week == 50){
                $timeaa   = "2015W501";
                $timebb   = "2015W507";
            } else if ($week == 51){
                $timeaa   = "2015W511";
                $timebb   = "2015W517";
            } else if ($week == 52){
                $timeaa   = "2015W521";
                $timebb   = "2015W527";
            } else {
                show_error('Undefined week number');
            }
            return $this->__get_weekly_total($timeaa, $timebb);
        }
        
        private function __result_week_red($week)
        {
            if ($week == 1){
                $timeaa   = "2015W011";
                $timebb   = "2015W017";
            } else if ($week == 2){
                $timeaa   = "2015W021";
                $timebb   = "2015W027";
            } else if ($week == 3){
                $timeaa   = "2015W031";
                $timebb   = "2015W037";
            } else if ($week == 4){
                $timeaa   = "2015W041";
                $timebb   = "2015W067";
            } else if ($week == 7){
                $timeaa   = "2015W071";
                $timebb   = "2015W077";
            } else if ($week == 8){
                $timeaa   = "2015W081";
                $timebb   = "2015W087";
            } else if ($week == 9){
                $timeaa   = "2015W091";
                $timebb   = "2015W097";
            } else if ($week == 10){
                $timebb   = "2015W047";
            } else if ($week == 5){
                $timeaa   = "2015W051";
                $timebb   = "2015W057";
            } else if ($week == 6){
                $timeaa   = "2015W061";
                $timebb   = "2015W067";
            } else if ($week == 7){
                $timeaa   = "2015W071";
                $timebb   = "2015W077";
            } else if ($week == 8){
                $timeaa   = "2015W081";
                $timebb   = "2015W087";
            } else if ($week == 9){
                $timeaa   = "2015W091";
                $timebb   = "2015W097";
            } else if ($week == 10){
                $timeaa   = "2015W101";
                $timebb   = "2015W107";
            } else if ($week == 11){
                $timeaa   = "2015W111";
                $timebb   = "2015W117";
            } else if ($week == 12){
                $timeaa   = "2015W121";
                $timebb   = "2015W127";
            } else if ($week == 13){
                $timeaa   = "2015W131";
                $timebb   = "2015W137";
            } else if ($week == 14){
                $timeaa   = "2015W141";
                $timebb   = "2015W147";
            } else if ($week == 15){
                $timeaa   = "2015W151";
                $timebb   = "2015W157";
            } else if ($week == 16){
                $timeaa   = "2015W161";
                $timebb   = "2015W167";
            } else if ($week == 17){
                $timeaa   = "2015W171";
                $timebb   = "2015W177";
            } else if ($week == 18){
                $timeaa   = "2015W181";
                $timebb   = "2015W187";
            } else if ($week == 19){
                $timeaa   = "2015W191";
                $timebb   = "2015W197";
            } else if ($week == 20){
                $timeaa   = "2015W201";
                $timebb   = "2015W207";
            } else if ($week == 21){
                $timeaa   = "2015W211";
                $timebb   = "2015W217";
            } else if ($week == 22){
                $timeaa   = "2015W221";
                $timebb   = "2015W227";
            } else if ($week == 23){
                $timeaa   = "2015W231";
                $timebb   = "2015W237";
            } else if ($week == 24){
                $timeaa   = "2015W241";
                $timebb   = "2015W247";
            } else if ($week == 25){
                $timeaa   = "2015W251";
                $timebb   = "2015W257";
            } else if ($week == 26){
                $timeaa   = "2015W261";
                $timebb   = "2015W267";
            } else if ($week == 27){
                $timeaa   = "2015W271";
                $timebb   = "2015W277";
            } else if ($week == 28){
                $timeaa   = "2015W281";
                $timebb   = "2015W287";
            } else if ($week == 29){
                $timeaa   = "2015W291";
                $timebb   = "2015W297";
            } else if ($week == 30){
                $timeaa   = "2015W301";
                $timebb   = "2015W307";
            } else if ($week == 31){
                $timeaa   = "2015W311";
                $timebb   = "2015W317";
            } else if ($week == 32){
                $timeaa   = "2015W321";
                $timebb   = "2015W327";
            } else if ($week == 33){
                $timeaa   = "2015W331";
                $timebb   = "2015W337";
            } else if ($week == 34){
                $timeaa   = "2015W341";
                $timebb   = "2015W347";
            } else if ($week == 35){
                $timeaa   = "2015W351";
                $timebb   = "2015W357";
            } else if ($week == 36){
                $timeaa   = "2015W361";
                $timebb   = "2015W367";
            } else if ($week == 37){
                $timeaa   = "2015W371";
                $timebb   = "2015W377";
            } else if ($week == 38){
                $timeaa   = "2015W381";
                $timebb   = "2015W387";
            } else if ($week == 39){
                $timeaa   = "2015W391";
                $timebb   = "2015W397";
            } else if ($week == 40){
                $timeaa   = "2015W401";
                $timebb   = "2015W407";
            } else if ($week == 41){
                $timeaa   = "2015W411";
                $timebb   = "2015W417";
            } else if ($week == 42){
                $timeaa   = "2015W421";
                $timebb   = "2015W427";
            } else if ($week == 43){
                $timeaa   = "2015W431";
                $timebb   = "2015W437";
            } else if ($week == 44){
                $timeaa   = "2015W441";
                $timebb   = "2015W447";
            } else if ($week == 45){
                $timeaa   = "2015W451";
                $timebb   = "2015W457";
            } else if ($week == 46){
                $timeaa   = "2015W461";
                $timebb   = "2015W467";
            } else if ($week == 47){
                $timeaa   = "2015W471";
                $timebb   = "2015W477";
            } else if ($week == 48){
                $timeaa   = "2015W481";
                $timebb   = "2015W487";
            } else if ($week == 49){
                $timeaa   = "2015W491";
                $timebb   = "2015W497";
            } else if ($week == 50){
                $timeaa   = "2015W501";
                $timebb   = "2015W507";
            } else if ($week == 51){
                $timeaa   = "2015W511";
                $timebb   = "2015W517";
            } else if ($week == 52){
                $timeaa   = "2015W521";
                $timebb   = "2015W527";
            } else {
                show_error('Undefined week number');
            }
            $redul      = $this->__get_weekly_red_ul($timeaa, $timebb);
            $reddl      = $this->__get_weekly_red_dl($timeaa, $timebb);
            $redtotal   = $redul+$reddl;
            return $redtotal;
        }
        
        private function __result_week_green($week)
        {
            $red        = $this->__result_week_red($week);
            $total      = $this->__result_week_total($week);
            if ($total == 0){
                $perce      = 0;
            } else if ($red == 0){
                $perce      = 0;
            } else
            {
                $green      = $total-$red;
                $perce      = round($green/$total*100, 2);
            }
            return $perce;
        }
        
        private function __get_weekly_total($timeaa, $timebb)
        {
            $this->load->model('report_model');
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance($timea, $timeb);
            return $query;
        }
        
        private function __get_weekly_red_ul($timeaa, $timebb)
        {
            $this->load->model('report_model');
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance_redul($timea, $timeb);
            return $query;
        }
        
        private function __get_weekly_red_dl($timeaa, $timebb)
        {
            $this->load->model('report_model');
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $this->report_model->weekly_performance_reddl($timea, $timeb);
            return $query;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */