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
            // Save data from report model then save return variable to $data
            $data   = $CI->report_model->all_sum_race();
            // Return data to the function
            return $data;
        }
        
        function redrace()
        {
            // Load report model from helper
            $CI =& get_instance();
            $CI->load->model('report_model');
            // Savae data from report model, all sum redrace to variable $data
            $data   = $CI->report_model->all_sum_redrace();
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
            $data   = $CI->report_model->individual_performance($name);
            $all    = $CI->sumrace();
            $green  = round($data/$all*100, 2);
            return $green;
        }
    
}
