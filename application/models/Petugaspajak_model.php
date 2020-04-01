<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;
class Petugaspajak_model extends CI_Model
{

    private $_client;

    public function __construct() {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/intipajak_rest/api/',
        ]);

    }

    public function getAllPetugasPajak()
    {
        /*$this->db->query("SET sql_mode = '' ");
        return $this->db->get('petugaspajak')->result_array();*/

		$response = $this->_client->request('GET', 'petugas_pajak', [
			'query' => [
				'kunci' => 'kunci1',
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'];
    }
    function tambahdataptgp()
    {
        $this->db->query("SET sql_mode = '' ");
        $data = [
            "namapetugas" => $this->input->post('namapetugas', true),
            "alamat" => $this->input->post('alamat', true),
            "notelp" => $this->input->post('notelp', true),
            "password" => $this->input->post('password', true),
            "level" => $this->input->post('level', true),
            'kunci' => 'kunci1'
        ];

        //$this->db->insert('petugaspajak', $data);

        $response = $this->_client->request('POST', 'petugas_pajak',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    public function hapusdataptgp($idpetugas)
    {
        /*$this->db->query("SET sql_mode = '' ");
        $this->db->where('idpetugas', $idpetugas);
        $this->db->delete('petugaspajak');*/

        $response = $this->_client->request('DELETE', 'petugas_pajak',[
            'form_params' => [
                'kunci' => 'kunci1',
                'idpetugas' => $idpetugas
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

		return $result;
    }

    public function getAllPetugasPajakbyID($idpetugas)
    {
        /*$this->db->query("SET sql_mode = '' ");
        return $this->db->get_where('petugaspajak', ['idpetugas' => $idpetugas])->row_array();*/

        $response = $this->_client->request('GET', 'objek_pajak', [
			'query' => [
                'kunci' => 'kunci1',
                'idpetugas' => $idpetugas
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'][0];
    }
    public function ubahptgp()
    {
        $this->db->query("SET sql_mode = '' ");
        /*$data = [
            "namapetugas" => $this->input->post('namapetugas', true),
            "alamat" => $this->input->post('alamat', true),
            "notelp" => $this->input->post('notelp', true)
        ];*/
        $data = [
            "namapetugas" => $this->input->post('namapetugas', true),
            "alamat" => $this->input->post('alamat', true),
            "notelp" => $this->input->post('notelp', true),
            "password" => $this->input->post('password', true),
            "level" => $this->input->post('level', true),
            "idpetugas" => $this->input->post('idpetugas', true),
            'kunci' => 'kunci1'
        ];
        /*$this->db->where('idpetugas', $this->input->post('idpetugas'));
        return $this->db->update('petugaspajak', $data);*/
        $response = $this->_client->request('PUT', 'petugas_pajak',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataPetugasPajak()
    {
        $this->db->query("SET sql_mode = '' ");
        $keyword = $this->input->post('keyword');
        $this->db->like('namapetugas', $keyword);
        return $this->db->get('petugaspajak')->result_array();
    }
}
?>