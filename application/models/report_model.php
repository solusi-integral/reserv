<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_model
 *
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */
class Report_model extends CI_Model{
    //put your code here
    /**
    public $jump_date;
    public $type;
    public $runners;
    public $number;
    public $location;
    public $results;
    public $comment;
     */
     
    public function insert($data)
    {
        return $this->db->insert('data', $data);
    }
    
    public function get_races()
    {
        $this->db->order_by('Time', 'DESC');
        $query  = $this->db->get('result', 200);
        return $query->result();
    }
    
    public function get_races_6()
    {
        $this->db->order_by('Time', 'DESC');
        $query  = $this->db->get('result', 6);
        return $query->result();
    }
    
    public function all_sum_race()
    {
        $query   = $this->db->count_all_results('result');
        return $query;
        
    }
    
    public function all_sum_redrace()
    {
        $this->load->helper('date');
        $now                = time();
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Results <', $UL);
        $this->db->or_where('Results >', $DL);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function all_gtype_sum_race()
    {
        $this->load->helper('date');
        $Gtype      = 'G';
        $this->db->where('Type =', $Gtype);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function all_ttype_sum_race()
    {
        $this->load->helper('date');
        $Ttype      = 'T';
        $this->db->where('Type =', $Ttype);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function all_rtype_sum_race()
    {
        $this->load->helper('date');
        $Rtype      = 'R';
        $this->db->where('Type =', $Rtype);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function today_sum_race()
    {
        $this->load->helper('date');
        $time   = now();
        $today  = date("Y-m-d", $time);
        $this->db->where('Date =', $today);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function today_red_ul()
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time);
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Date =', $today);
        $this->db->where('Results <', $UL);
        $this->db->from('result');
        $query  = $this->db->count_all_results();
        return $query;
    }
    
    public function today_red_dl()
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time);
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Date =', $today);
        $this->db->where('Results >', $DL);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function yesterday_sum_race()
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time - 86400);
        $this->db->where('Date =', $today);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function yesterday_red_ul()
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time - 86400);
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Date =', $today);
        $this->db->where('Results <', $UL);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function yesterday_red_dl()
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time - 86400);
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Date =', $today);
        $this->db->where('Results >', $DL);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function global_sum_race($offset)
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time - $offset);
        $this->db->where('Date =', $today);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function global_red_ul($offset)
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time - $offset);
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Date =', $today);
        $this->db->where('Results <', $UL);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function global_red_dl($offset)
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time - $offset);
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Date =', $today);
        $this->db->where('Results >', $DL);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
}
