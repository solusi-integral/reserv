<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Tes
 * 
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */

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
//            $timeaa   = "2014W111";
//            $timebb   = "2014W117";
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
            
            $data['array']      = $data1;
            $data['array2']     = $data2;
            $this->load->view('tes', $data);
            
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
            
            $data['array2']     = $mergeData;
            $this->load->view('weekly', $data);
        }
                
        private function __result_week_total($week)
        {
            if ($week == 1){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W021";
                $timebb   = "2014W027";
            } else if ($week == 3){
                $timeaa   = "2014W031";
                $timebb   = "2014W037";
            } else if ($week == 4){
                $timeaa   = "2014W041";
                $timebb   = "2014W047";
            } else if ($week == 5){
                $timeaa   = "2014W051";
                $timebb   = "2014W057";
            } else if ($week == 6){
                $timeaa   = "2014W061";
                $timebb   = "2014W067";
            } else if ($week == 7){
                $timeaa   = "2014W071";
                $timebb   = "2014W077";
            } else if ($week == 8){
                $timeaa   = "2014W081";
                $timebb   = "2014W087";
            } else if ($week == 9){
                $timeaa   = "2014W091";
                $timebb   = "2014W097";
            } else if ($week == 10){
                $timeaa   = "2014W101";
                $timebb   = "2014W107";
            } else if ($week == 11){
                $timeaa   = "2014W111";
                $timebb   = "2014W117";
            } else if ($week == 12){
                $timeaa   = "2014W121";
                $timebb   = "2014W127";
            } else if ($week == 13){
                $timeaa   = "2014W131";
                $timebb   = "2014W137";
            } else if ($week == 14){
                $timeaa   = "2014W141";
                $timebb   = "2014W147";
            } else if ($week == 15){
                $timeaa   = "2014W151";
                $timebb   = "2014W157";
            } else if ($week == 16){
                $timeaa   = "2014W161";
                $timebb   = "2014W167";
            } else if ($week == 17){
                $timeaa   = "2014W171";
                $timebb   = "2014W177";
            } else if ($week == 18){
                $timeaa   = "2014W181";
                $timebb   = "2014W187";
            } else if ($week == 19){
                $timeaa   = "2014W191";
                $timebb   = "2014W197";
            } else if ($week == 20){
                $timeaa   = "2014W201";
                $timebb   = "2014W207";
            } else if ($week == 21){
                $timeaa   = "2014W211";
                $timebb   = "2014W217";
            } else if ($week == 22){
                $timeaa   = "2014W221";
                $timebb   = "2014W227";
            } else if ($week == 23){
                $timeaa   = "2014W231";
                $timebb   = "2014W237";
            } else if ($week == 24){
                $timeaa   = "2014W241";
                $timebb   = "2014W247";
            } else if ($week == 25){
                $timeaa   = "2014W251";
                $timebb   = "2014W257";
            } else if ($week == 26){
                $timeaa   = "2014W261";
                $timebb   = "2014W267";
            } else if ($week == 27){
                $timeaa   = "2014W271";
                $timebb   = "2014W277";
            } else if ($week == 28){
                $timeaa   = "2014W281";
                $timebb   = "2014W287";
            } else if ($week == 29){
                $timeaa   = "2014W291";
                $timebb   = "2014W297";
            } else if ($week == 30){
                $timeaa   = "2014W301";
                $timebb   = "2014W307";
            } else if ($week == 31){
                $timeaa   = "2014W311";
                $timebb   = "2014W317";
            } else if ($week == 32){
                $timeaa   = "2014W321";
                $timebb   = "2014W327";
            } else if ($week == 33){
                $timeaa   = "2014W331";
                $timebb   = "2014W337";
            } else if ($week == 34){
                $timeaa   = "2014W341";
                $timebb   = "2014W347";
            } else if ($week == 35){
                $timeaa   = "2014W351";
                $timebb   = "2014W357";
            } else if ($week == 36){
                $timeaa   = "2014W361";
                $timebb   = "2014W367";
            } else if ($week == 37){
                $timeaa   = "2014W371";
                $timebb   = "2014W377";
            } else if ($week == 38){
                $timeaa   = "2014W381";
                $timebb   = "2014W387";
            } else if ($week == 39){
                $timeaa   = "2014W391";
                $timebb   = "2014W397";
            } else if ($week == 40){
                $timeaa   = "2014W401";
                $timebb   = "2014W407";
            } else if ($week == 41){
                $timeaa   = "2014W411";
                $timebb   = "2014W417";
            } else if ($week == 42){
                $timeaa   = "2014W421";
                $timebb   = "2014W427";
            } else if ($week == 43){
                $timeaa   = "2014W431";
                $timebb   = "2014W437";
            } else if ($week == 44){
                $timeaa   = "2014W441";
                $timebb   = "2014W447";
            } else if ($week == 45){
                $timeaa   = "2014W451";
                $timebb   = "2014W457";
            } else if ($week == 46){
                $timeaa   = "2014W461";
                $timebb   = "2014W467";
            } else if ($week == 47){
                $timeaa   = "2014W471";
                $timebb   = "2014W477";
            } else if ($week == 48){
                $timeaa   = "2014W481";
                $timebb   = "2014W487";
            } else if ($week == 49){
                $timeaa   = "2014W491";
                $timebb   = "2014W497";
            } else if ($week == 50){
                $timeaa   = "2014W501";
                $timebb   = "2014W507";
            } else if ($week == 51){
                $timeaa   = "2014W511";
                $timebb   = "2014W517";
            } else if ($week == 52){
                $timeaa   = "2014W521";
                $timebb   = "2014W527";
            } else {
                show_error('Undefined week number');
            }
            return $this->__get_weekly_total($timeaa, $timebb);
        }
        
        private function __result_week_red($week)
        {
            if ($week == 1){
                $timeaa   = "2014W011";
                $timebb   = "2014W017";
            } else if ($week == 2){
                $timeaa   = "2014W021";
                $timebb   = "2014W027";
            } else if ($week == 3){
                $timeaa   = "2014W031";
                $timebb   = "2014W037";
            } else if ($week == 4){
                $timeaa   = "2014W041";
                $timebb   = "2014W067";
            } else if ($week == 7){
                $timeaa   = "2014W071";
                $timebb   = "2014W077";
            } else if ($week == 8){
                $timeaa   = "2014W081";
                $timebb   = "2014W087";
            } else if ($week == 9){
                $timeaa   = "2014W091";
                $timebb   = "2014W097";
            } else if ($week == 10){
                $timebb   = "2014W047";
            } else if ($week == 5){
                $timeaa   = "2014W051";
                $timebb   = "2014W057";
            } else if ($week == 6){
                $timeaa   = "2014W061";
                $timebb   = "2014W067";
            } else if ($week == 7){
                $timeaa   = "2014W071";
                $timebb   = "2014W077";
            } else if ($week == 8){
                $timeaa   = "2014W081";
                $timebb   = "2014W087";
            } else if ($week == 9){
                $timeaa   = "2014W091";
                $timebb   = "2014W097";
            } else if ($week == 10){
                $timeaa   = "2014W101";
                $timebb   = "2014W107";
            } else if ($week == 11){
                $timeaa   = "2014W111";
                $timebb   = "2014W117";
            } else if ($week == 12){
                $timeaa   = "2014W121";
                $timebb   = "2014W127";
            } else if ($week == 13){
                $timeaa   = "2014W131";
                $timebb   = "2014W137";
            } else if ($week == 14){
                $timeaa   = "2014W141";
                $timebb   = "2014W147";
            } else if ($week == 15){
                $timeaa   = "2014W151";
                $timebb   = "2014W157";
            } else if ($week == 16){
                $timeaa   = "2014W161";
                $timebb   = "2014W167";
            } else if ($week == 17){
                $timeaa   = "2014W171";
                $timebb   = "2014W177";
            } else if ($week == 18){
                $timeaa   = "2014W181";
                $timebb   = "2014W187";
            } else if ($week == 19){
                $timeaa   = "2014W191";
                $timebb   = "2014W197";
            } else if ($week == 20){
                $timeaa   = "2014W201";
                $timebb   = "2014W207";
            } else if ($week == 21){
                $timeaa   = "2014W211";
                $timebb   = "2014W217";
            } else if ($week == 22){
                $timeaa   = "2014W221";
                $timebb   = "2014W227";
            } else if ($week == 23){
                $timeaa   = "2014W231";
                $timebb   = "2014W237";
            } else if ($week == 24){
                $timeaa   = "2014W241";
                $timebb   = "2014W247";
            } else if ($week == 25){
                $timeaa   = "2014W251";
                $timebb   = "2014W257";
            } else if ($week == 26){
                $timeaa   = "2014W261";
                $timebb   = "2014W267";
            } else if ($week == 27){
                $timeaa   = "2014W271";
                $timebb   = "2014W277";
            } else if ($week == 28){
                $timeaa   = "2014W281";
                $timebb   = "2014W287";
            } else if ($week == 29){
                $timeaa   = "2014W291";
                $timebb   = "2014W297";
            } else if ($week == 30){
                $timeaa   = "2014W301";
                $timebb   = "2014W307";
            } else if ($week == 31){
                $timeaa   = "2014W311";
                $timebb   = "2014W317";
            } else if ($week == 32){
                $timeaa   = "2014W321";
                $timebb   = "2014W327";
            } else if ($week == 33){
                $timeaa   = "2014W331";
                $timebb   = "2014W337";
            } else if ($week == 34){
                $timeaa   = "2014W341";
                $timebb   = "2014W347";
            } else if ($week == 35){
                $timeaa   = "2014W351";
                $timebb   = "2014W357";
            } else if ($week == 36){
                $timeaa   = "2014W361";
                $timebb   = "2014W367";
            } else if ($week == 37){
                $timeaa   = "2014W371";
                $timebb   = "2014W377";
            } else if ($week == 38){
                $timeaa   = "2014W381";
                $timebb   = "2014W387";
            } else if ($week == 39){
                $timeaa   = "2014W391";
                $timebb   = "2014W397";
            } else if ($week == 40){
                $timeaa   = "2014W401";
                $timebb   = "2014W407";
            } else if ($week == 41){
                $timeaa   = "2014W411";
                $timebb   = "2014W417";
            } else if ($week == 42){
                $timeaa   = "2014W421";
                $timebb   = "2014W427";
            } else if ($week == 43){
                $timeaa   = "2014W431";
                $timebb   = "2014W437";
            } else if ($week == 44){
                $timeaa   = "2014W441";
                $timebb   = "2014W447";
            } else if ($week == 45){
                $timeaa   = "2014W451";
                $timebb   = "2014W457";
            } else if ($week == 46){
                $timeaa   = "2014W461";
                $timebb   = "2014W467";
            } else if ($week == 47){
                $timeaa   = "2014W471";
                $timebb   = "2014W477";
            } else if ($week == 48){
                $timeaa   = "2014W481";
                $timebb   = "2014W487";
            } else if ($week == 49){
                $timeaa   = "2014W491";
                $timebb   = "2014W497";
            } else if ($week == 50){
                $timeaa   = "2014W501";
                $timebb   = "2014W507";
            } else if ($week == 51){
                $timeaa   = "2014W511";
                $timebb   = "2014W517";
            } else if ($week == 52){
                $timeaa   = "2014W521";
                $timebb   = "2014W527";
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

/* End of file tes.php */
/* Location: ./application/controllers/tes.php */