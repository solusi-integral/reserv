<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of location_model
 *
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */
class Location_model extends CI_Model{
    //put your code here
    
    public function insert($race_type, $loc_name)
    {
        $data = array(
            'Type' => $race_type ,
            'Location' => $loc_name
        );
        return $this->db->insert('Location',$data);
    }
    
    public function lookup()
    {
        //Sort Database in order ascending based on Location names
        $this->db->order_by('Location', 'asc'); 
        //Get database from table - Location
        $query = $this->db->get('Location');
        // return the query
        return $query;
    }
    
    public function ginsert($race_type, $loc_name)
    {
        $data = array(
            'Type' => $race_type ,
            'Location' => $loc_name
        );
        return $this->db->insert('G_Location',$data);        
    }
    
    public function tinsert($race_type, $loc_name)
    {
        $data = array(
            'Type' => $race_type ,
            'Location' => $loc_name
        );
        return $this->db->insert('T_Location',$data);        
    }
    
    public function rinsert($race_type, $loc_name)
    {
        $data = array(
            'Type' => $race_type ,
            'Location' => $loc_name
        );
        return $this->db->insert('R_Location',$data);        
    }
    
}
