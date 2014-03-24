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
        $this->db->where('Counted =', 1);
        $query   = $this->db->count_all_results('result');
        return $query;
        
    }
    
    private function all_sum_redrace1()
    {
        $this->load->helper('date');
        $now                = time();
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Results <', $UL);
        $this->db->where('Counted = ', 1);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    private function all_sum_redrace2()
    {
        $this->load->helper('date');
        $now                = time();
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Results >', $DL);
        $this->db->where('Counted = ', 1);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function all_sum_redrace()
    {
        $redrace    = $this->all_sum_redrace1();
        $redrace2   = $this->all_sum_redrace2();
        $tredrace   = $redrace+$redrace2;
        return $tredrace;
    }
    
    public function all_gtype_sum_race()
    {
        $this->load->helper('date');
        $Gtype      = 'G';
        $this->db->where('Type =', $Gtype);
        $this->db->where('Counted =', 1);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function all_ttype_sum_race()
    {
        $this->load->helper('date');
        $Ttype      = 'T';
        $this->db->where('Type =', $Ttype);
        $this->db->where('Counted =', 1);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function all_rtype_sum_race()
    {
        $this->load->helper('date');
        $Rtype      = 'R';
        $this->db->where('Type =', $Rtype);
        $this->db->where('Counted =', 1);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function today_sum_race()
    {
        $this->load->helper('date');
        $time   = now();
        $today  = date("Y-m-d", $time);
        $this->db->where('Date =', $today);
        $this->db->where('Counted =', 1);
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
        $this->db->where('Counted =', 1);
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
        $this->db->where('Counted =', 1);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function yesterday_sum_race()
    {
        $this->load->helper('date');
        $time = now();
        $today  = date("Y-m-d", $time - 86400);
        $this->db->where('Date =', $today);
        $this->db->where('Counted =', 1);
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
        $this->db->where('Counted =', 1);
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
        $this->db->where('Counted =', 1);
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
    
    public function edit_race($id, $data)
    {
        
    }
    
    public function info_race($id)
    {
        $this->db->where('ID =', $id);
        $this->db->from('result');
        return $this->db->get();
    }
    
    public function update_race($id, $comment)
    {
        $data   = array(
            'Comment' => $comment
        );
        $this->db->where('ID', $id);
        $this->db->update('result', $data);
    }
    
    public function individual_performance($name)
    {
        $this->db->like('Name', $name);
        $this->db->where('Counted =', 1);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function weekly_performance($datea, $dateb)
    {
        $this->db->where('Counted =', 1);
        $this->db->where('Date >=', $datea);
        $this->db->where('Date <=', $dateb);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function weekly_performance_redul($datea, $dateb)
    {
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Counted =', 1);
        $this->db->where('Results >', $UL);
        $this->db->where('Date >=', $datea);
        $this->db->where('Date <=', $dateb);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
    
    public function weekly_performance_reddl($datea, $dateb)
    {
        $UL                 = 1;
        $DL                 = 15;  
        $this->db->where('Counted =', 1);
        $this->db->where('Results >', $DL);
        $this->db->where('Date >=', $datea);
        $this->db->where('Date <=', $dateb);
        $this->db->from('result');
        return $this->db->count_all_results();
    }
}

