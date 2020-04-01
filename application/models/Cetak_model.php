<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;
class Cetak_model extends CI_Model
{
    private $_client;

    public function __construct() {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/intipajak_rest/api/',
        ]);

    }

    public function view()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('pembayaran.*,pembayaran.idbayar,wajibpajak.nama,objekpajak.nomorplat,petugaspajak.namapetugas,objekpajak.besarpajak');
        $this->db->join('wajibpajak', 'wajibpajak.idnpwp = pembayaran.idnpwpfk');
        $this->db->join('objekpajak', 'objekpajak.idobjekpajak = pembayaran.idobjekpajakfk');
        $this->db->join('petugaspajak', 'petugaspajak.idpetugas = pembayaran.idpetugasfk');
        return $this->db->get('pembayaran')->result_array();
    }

}
?>