<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_model
 *
 * @author indra
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
}
