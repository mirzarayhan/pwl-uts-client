<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;
/**
 * 
 */
class Home_model extends CI_Model
{

	public function getAll()
	{
	    /*$this->db->query("SET sql_mode = '' ");
		$this->db->select('pembayaran.*,pembayaran.idbayar,wajibpajak.nama,objekpajak.nomorplat,petugaspajak.namapetugas,objekpajak.besarpajak');
		$this->db->join('wajibpajak', 'wajibpajak.idnpwp = pembayaran.idnpwpfk');
		$this->db->join('objekpajak', 'objekpajak.idobjekpajak = pembayaran.idobjekpajakfk');
		$this->db->join('petugaspajak', 'petugaspajak.idpetugas = pembayaran.idpetugasfk');
		return $this->db->get('pembayaran')->result_array();*/

		$client = new Client();

		$response = $client->request('GET', 'http://localhost/intipajak_rest/api/pembayaran', [
			'query' => [
				'kunci' => 'kunci1',
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'];
	}

	public function cariDataPembayaranPajak()
	{
		$this->db->query("SET sql_mode = '' ");
		$keyword = $this->input->post('keyword');
		$this->db->like('wajibpajak.nama', $keyword);
		$this->db->select('pembayaran.*,pembayaran.idbayar,wajibpajak.nama,objekpajak.nomorplat,petugaspajak.namapetugas,objekpajak.besarpajak');
		$this->db->join('wajibpajak', 'wajibpajak.idnpwp = pembayaran.idnpwpfk');
		$this->db->join('objekpajak', 'objekpajak.idobjekpajak = pembayaran.idobjekpajakfk');
		$this->db->join('petugaspajak', 'petugaspajak.idpetugas = pembayaran.idpetugasfk');
		return $this->db->get('pembayaran')->result_array();
	}

	public function datatabels()
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