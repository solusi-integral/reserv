<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of result_model
 *
 * @author indra
 */
class Result_model extends CI_Model {
    //put your code here
    
    public function count($time)
    {
        // Filter table for spesific data
        $this->db->where('date =', $time);
        // Get the data from notification table
        $this->db->from('daily_result');
        // Count the number of row 
        $query  = $this->db->count_all_results();
        // Return the query to the caller
        return $query;
    }
    
    public function insert($perce,$time)
    {
        // Create an array to enter the data
        $data = array(
            'date'      => $time,
            'percentage' => $perce,
        );
        // Return the data to function caller
        return $this->db->insert('daily_result',$data);
    }
    
    public function lookup($time)
    {
        // Lookup database for spesific criteria
        $this->db->where('date =', $time);
        // Get data from notification table
        $this->db->from('daily_result');
        // Execute the query and store it
        $query  = $this->db->get();
        // return the query
        return $query;
    }
}
