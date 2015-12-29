<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Performance
 *
 * @author indra
 */
class Performance {
    
    //put your code here
    /**
            /* This function is use to find the total number of race.
            /* That figure will be use to calculate the performance of the day
            /* @var author Indra
            /* @var 	numeric 	$data
            **/
        function sumrace()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $CI->load->driver('cache');
            $key    = 'KJdgh38If9247adfkj9348KJdfg';
            if ( ! $data = $CI->cache->memcached->get($key))
            {
                // Save data from report model then save return variable to $data
                $data   = $CI->report_model->all_sum_race();
                // Save data to Memcached
                $CI->cache->memcached->save($key, $data, 600);
            }
            // Return data to the function
            return $data;
        }
        
        function redrace()
        {
            // Load report model from helper
            $CI =& get_instance();
            $CI->load->model('report_model');
            $CI->load->driver('cache');
            $key    = 'ASjur20fiyKhf93LfhkaduyDLfh';
            if ( ! $data = $CI->cache->memcached->get($key))
            {
                // Savae data from report model, all sum redrace to variable $data
                $data   = $CI->report_model->all_sum_redrace();
                // Save data to Memcached
                $CI->cache->memcached->save($key, $data, 600);
            }
            // Return the variable containing result to the caller
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
        
        function GType()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $Gtyper                = $CI->report_model->all_gtype_sum_race();
            return $Gtyper;          
        }
        
        function TType()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $Ttyper                = $CI->report_model->all_ttype_sum_race();
            return $Ttyper;
        }
        
        function RType()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $Rtyper                = $CI->report_model->all_rtype_sum_race();
            return $Rtyper;
        }
        
        function status()
        {
            $status = $this->green_percentage();
            if ($status > 90){
                $pesan  = 'Great';
            }
            else if ($status > 80){
                $pesan  = 'Good';
            }
            else if ($status > 75){
                $pesan  = 'Fair';
            }
            else {
                $pesan  = 'Bad';
            }
            return $pesan; 
        }
        
        function today()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $today_total  = $CI->report_model->today_sum_race();
            return $today_total;
        }
        
        function today_red()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $todayul        = $CI->report_model->today_red_ul();
            $todaydl        = $CI->report_model->today_red_dl();
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function today_green()
        {
            $total  = $this->today();
            $red    = $this->today_red();
            
            if ($red == 0)
            {
                $perce1 = 100;
            }
            else 
            {
                $green  = $total-$red;
                $perce1     = round(($green/$total*100),2);
            }
            return $perce1;
        }
        
        function today_performance()
        {
            $status = $this->today_green();
            if ($status > 90){
                $pesan  = 'Great';
            }
            else if ($status > 80){
                $pesan  = 'Good';
            }
            else if ($status > 75){
                $pesan  = 'Fair';
            }
            else {
                $pesan  = 'Bad';
            }
            return $pesan; 
        }
        
        function yesterday()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $today_total    = $CI->report_model->yesterday_sum_race();
            return $today_total;
        }
        
        function yesterday_red()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $todayul        = $CI->report_model->yesterday_red_ul();
            $todaydl        = $CI->report_model->yesterday_red_dl();
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        /*
            * This function is used to calculate overall performance for previous day.
            * To avoid any error in the code, we can't leave the value devided by zero
            * Especially when there are no activity from the previous days.
            * @author	Indra
            * @var      numeric		$total 		Numeric Value from yesterday, all it
            * @var		numeric 	$red		Numeric Value from yesterday, only red 
            * @var 		numberic 	$green		Numberic Value from yesterday, number supplied using the different value of Total and RED
            * @var		numeric		$perce1		Percentage value from yesterday, rounded by 2 digits, format xx.xx with out percent sign
            * @var		return		$perce1		Return to the caller from perce1 calculation number. 
            */
        function yesterday_green()
        {
            $total  = $this->yesterday();
            $red    = $this->yesterday_red();
            $green  = $total-$red;
            if ($total==0)
                {
                    $total = 1;
                }
            $perce1 = round(($green/$total*100),2);
            return $perce1;
        }
        
        /* 
            * This function is used to calculate the day before yesterday.
            * To avoid any error in the result, we can't devide the value by zero
            * 
            * @var 		numeric		$offset			How many hours do we have to go back for the performance calculation
            * @var		numeric 	$today_total	Look up the database to get the total number of event
            */
        function twday_sum()
        {
            // Load model named 'report'
            $CI =& get_instance();
            $CI->load->model('report_model');
            // Count the hours before by 3 x 60 minutes x 60 seconds x 24 hours. 
            $offset         = 3*60*60*24;
            // Today total by using the number from the database from three days ago
            $today_total    = $CI->report_model->global_sum_race($offset);
            // Return value to caller using the calculation provided before
            return $today_total;
        }
        
        /*
            * This function is used to calculate the faulty races from the 2 days ago
            * 
            */
        function twday_red()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $offset         = 3*60*60*24;
            $todayul        = $CI->report_model->global_red_ul($offset);
            $todaydl        = $CI->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function twday_green()
        {
            $total  = $this->twday_sum();
            $red    = $this->twday_red();
            $green  = $total-$red;
            if ($total==0)
                {
                    $total = 1;
                }
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function thday_sum()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $offset         = 4*60*60*24;
            $today_total    = $CI->report_model->global_sum_race($offset);
            return $today_total;
        }
        
        function thday_red()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $offset         = 4*60*60*24;
            $todayul        = $CI->report_model->global_red_ul($offset);
            $todaydl        = $CI->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function thday_green()
        {
            $total  = $this->thday_sum();
            $red    = $this->thday_red();
            $green  = $total-$red;
            if ($total==0)
                {
                    $total = 1;
                }
            $perce1     = round(($green/$total*100),2);
            return $perce1;
        }
        
        function frday_sum()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $offset         = 5*60*60*24;
            $today_total    = $CI->report_model->global_sum_race($offset);
            return $today_total;
        }
        
        function frday_red()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $offset         = 5*60*60*24;
            $todayul        = $CI->report_model->global_red_ul($offset);
            $todaydl        = $CI->report_model->global_red_dl($offset);
            $today_total    = $todayul+$todaydl;
            $red    = $today_total;
            return $red;
        }
        
        function frday_green()
        {
            $total  = $this->frday_sum();
            $red    = $this->frday_red();
            $green  = $total-$red;
            if ($total==0)
                {
                    $total = 1;
                }
            $perce1 = round(($green/$total*100),2);
            return $perce1;
        }
        
        function last6()
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $data   = $CI->report_model->get_races_6();
            return $data;
        }
        
        function individual_performance($name)
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $CI->load->driver('cache');
            $key    = 'IOdfhJIUDfuej2346'.$name;
            if ( ! $green = $CI->cache->memcached->get($key))
            {
                $data   = $CI->report_model->individual_performance($name);
                $all    = $this->sumrace();
                $green  = round($data/$all*100, 2);
                // Save data to Memcached
                $CI->cache->memcached->save($key, $green, 600);
            }
            return $green;
        }
        
        public function result_week_total($week)
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
            return $this->get_weekly_total($timeaa, $timebb);
        }
        
        public function result_week_red($week)
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
            $redul      = $this->get_weekly_red_ul($timeaa, $timebb);
            $reddl      = $this->get_weekly_red_dl($timeaa, $timebb);
            $redtotal   = $redul+$reddl;
            return $redtotal;
        }
        
        public function result_week_green($week)
        {
            $red        = $this->result_week_red($week);
            $total      = $this->result_week_total($week);
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
        
        public function get_weekly_total($timeaa, $timebb)
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $CI->report_model->weekly_performance($timea, $timeb);
            return $query;
        }
        
        /**
         * Red Result Above Required Parameter
         * 
         * @param type $timeaa
         * @param type $timebb
         * @return type
         */
        public function get_weekly_red_ul($timeaa, $timebb)
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $CI->report_model->weekly_performance_redul($timea, $timeb);
            return $query;
        }
        
        /**
         * Red Result Below Required Parameter
         * 
         * @param type $timeaa
         * @param type $timebb
         * @return type
         */
        public function get_weekly_red_dl($timeaa, $timebb)
        {
            $CI =& get_instance();
            $CI->load->model('report_model');
            $timea  = date("Y-m-d",strtotime($timeaa));
            $timeb  = date("Y-m-d",strtotime($timebb));
            $query  = $CI->report_model->weekly_performance_reddl($timea, $timeb);
            return $query;
        }
    
}
