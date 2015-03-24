<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of location_model
 *
 * @author indra
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
        
    }
    
    
}
