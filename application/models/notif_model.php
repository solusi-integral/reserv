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
    
    public function insert($ticket_id,$time)
    {
        // Create an array to enter the data
        $data = array(
            'date'      => $time,
            'ticket_id' => $ticket_id,
            'notif_5'   => 0,
            'notif_10'  => 0,
            'notif_30'  => 0
        );
        // Return the data to function caller
        return $this->db->insert('notification',$data);
    }
    
    public function lookup($time)
    {
        // Lookup database for spesific criteria
        $this->db->where('date =', $time);
        // Get data from notification table
        $this->db->from('notification');
        // Execute the query and store it
        $query  = $this->db->get();
        // return the query
        return $query->result();
    }
    
    public function count($time)
    {
        // Filter table for spesific data
        $this->db->where('date =', $time);
        // Get the data from notification table
        $this->db->from('notification');
        // Count the number of row 
        $query  = $this->db->count_all_results();
        // Return the query to the caller
        return $query;
    }
    
    public function findticket($id)
    {
        // Find spesific data from the database
        $this->db->where('ticket_id =', $id);
        // Set the table and store the data to variable
        $query   = $this->db->count_all_results('notification');
        return $query;
    }
    
    public function update_ticket($id,$notif_5)
    {
        $data = array(
               'notif_5' => $notif_5
            );

        $this->db->where('ticket_id', $id);
        $query  = $this->db->update('notification', $data); 
        return $query->result();
    }
    
}
