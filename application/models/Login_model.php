<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function logpet($namapetugas,$password)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('namapetugas, password, level');
        $this->db->from('petugaspajak');
        $this->db->where('namapetugas', $namapetugas);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows()==1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function logwaj($namapetugas,$password)
    {
        $this->db->query("SET sql_mode = '' ");        
        $this->db->select('nama, password');
        $this->db->from('wajibpajak');
        $this->db->where('nama', $namapetugas);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows()==1) {
            return $query->result();
        } else {
            return false;
        }
        
    }

}
/* End of file login_model.php */
?>