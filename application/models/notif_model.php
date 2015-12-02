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
class Notif_model extends CI_Model{
    //put your code here
    
    public function insert($ticket_id)
    {
        $data = array(
            'ticket_id' => $ticket_id
        );
        return $this->db->insert('notification',$data);
    }
    
    public function lookup()
    {
        //Sort Database in order ascending based on Location names
        $this->db->order_by('notification_id', 'asc'); 
        //Get database from table - Location
        $query = $this->db->get('notification');
        // return the query
        return $query;
    }
    
    public function findticket($id)
    {
        $this->db->where('ticket_id =', $id);
        $query   = $this->db->count_all_results('notification');
        return $query;
    }
    
}
