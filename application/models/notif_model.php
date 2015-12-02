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
    
    public function lookup($time)
    {
        $this->db->where('date =', $time);
        //$this->db->from('notification');
        // return the query
        return $this->db->get('notification');;
    }
    
    public function findticket($id)
    {
        $this->db->where('ticket_id =', $id);
        $query   = $this->db->count_all_results('notification');
        return $query;
    }
    
}
