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
    public function today()
    {
        /* @var $CI type */
        $CI =& get_instance();
        $CI->load->model('report_model');
        $today_total                = $this->report_model->today_sum_race();
        return $today_total;
    }

    public function today_red()
    {
        $this->load->model('report_model');
        $todayul         = $this->report_model->today_red_ul();
        $todaydl        = $this->report_model->today_red_dl();
        $today_total    = $todayul+$todaydl;
        $red    = $today_total;
        return $red;
    }

    public function today_green()
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

    public function today_performance()
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

    public function yesterday()
    {
        $this->load->model('report_model');
        $today_total    = $this->report_model->yesterday_sum_race();
        return $today_total;
    }

    public function yesterday_red()
    {
        $this->load->model('report_model');
        $todayul         = $this->report_model->yesterday_red_ul();
        $todaydl        = $this->report_model->yesterday_red_dl();
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
    public function yesterday_green()
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
    public function twday_sum()
    {
                    // Load model named 'report'
        $this->load->model('report_model');
        // Count the hours before by 3 x 60 minutes x 60 seconds x 24 hours. 
                    $offset         = 3*60*60*24;
                    // Today total by using the number from the database from three days ago
        $today_total    = $this->report_model->global_sum_race($offset);
        // Return value to caller using the calculation provided before
                    return $today_total;
    }

    /*
        * This function is used to calculate the faulty races from the 2 days ago
        * 
        */
    public function twday_red()
    {
        $this->load->model('report_model');
        $offset         = 3*60*60*24;
        $todayul        = $this->report_model->global_red_ul($offset);
        $todaydl        = $this->report_model->global_red_dl($offset);
        $today_total    = $todayul+$todaydl;
        $red    = $today_total;
        return $red;
    }

    public function twday_green()
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

    public function thday_sum()
    {
        $this->load->model('report_model');
        $offset         = 4*60*60*24;
        $today_total    = $this->report_model->global_sum_race($offset);
        return $today_total;
    }

    public function thday_red()
    {
        $this->load->model('report_model');
        $offset         = 4*60*60*24;
        $todayul        = $this->report_model->global_red_ul($offset);
        $todaydl        = $this->report_model->global_red_dl($offset);
        $today_total    = $todayul+$todaydl;
        $red    = $today_total;
        return $red;
    }

    public function thday_green()
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

    public function frday_sum()
    {
        $this->load->model('report_model');
        $offset         = 5*60*60*24;
        $today_total    = $this->report_model->global_sum_race($offset);
        return $today_total;
    }

    public function frday_red()
    {
        $this->load->model('report_model');
        $offset         = 5*60*60*24;
        $todayul        = $this->report_model->global_red_ul($offset);
        $todaydl        = $this->report_model->global_red_dl($offset);
        $today_total    = $todayul+$todaydl;
        $red    = $today_total;
        return $red;
    }

    public function frday_green()
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

    public function last6()
    {
        $this->load->model('report_model');
        $data   = $this->report_model->get_races_6();
        return $data;
    }

    public function individual_performance($name)
    {
        $this->load->model('report_model');
        $data   = $this->report_model->individual_performance($name);
        $all    = $this->sumrace();
        $green  = round($data/$all*100, 2);
        return $green;
    }
    
}
