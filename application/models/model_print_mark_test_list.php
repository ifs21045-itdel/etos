<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_product_test_list
 *
 * @author hp
 */
class model_print_mark_test_list extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function select_query($query) {
        return $this->db->query($query)->result();
    }
    
  }