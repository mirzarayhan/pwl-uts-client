<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Index_model extends CI_Model {
    
       public function getAll()
       {
           $this->db->query("SET sql_mode = '' ");
           $this->db->select('*');
           $this->db->from('pembayaran');
           $this->db->join('wajibpajak', 'wajibpajak.idnpwp = pembayaran.idnpwpfk');
           $this->db->join('petugaspajak', 'petugaspajak.idpetugas = pembayaran.idpetugaspajakfk');
           $this->db->join('objekpajak', 'objekpajak.idobjekpajak = pembayaran.idobjekpajakfk');
           $query = $this->db->get();
           return $query->result_array();
           
       } 
    
    }
    
    /* End of file index_model.php */
    
?>