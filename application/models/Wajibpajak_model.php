<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;
class Wajibpajak_model extends CI_Model {

    public function __construct() {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/intipajak_rest/api/',
        ]);

    }

	public function getAllWajibPajak()
	{
	    /*$this->db->query("SET sql_mode = '' ");
        $this->db->select('');

        return $this->db->get('wajibpajak')->result_array();*/
        
        $response = $this->_client->request('GET', 'wajib_pajak', [
			'query' => [
				'kunci' => 'kunci1',
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'];
	}


    function tambahdatawjbp(){
        $this->db->query("SET sql_mode = '' ");
        $data=[
            "nama"=> $this->input->post('nama',true),
            "alamat"=> $this->input->post('alamat',true),
            "idobjekpajakfk" =>$this->input->post('idobjekpajakfk',true),
            "notelp"=> $this->input->post('notelp',true),
            "namalengkap"=> $this->input->post('namalengkap',true),
            "password"=> $this->input->post('password',true),
            'kunci' => 'kunci1'
        ];
        /*$this->db->insert('wajibpajak', $data);*/

        $response = $this->_client->request('POST', 'wajib_pajak',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }
    
    public function hapusdatawjbp($idnpwp) {
        /*$this->db->query("SET sql_mode = '' ");
        $this->db->where('idnpwp', $idnpwp);
        $this->db->delete('wajibpajak');*/
        $response = $this->_client->request('DELETE', 'wajib_pajak',[
            'form_params' => [
                'kunci' => 'kunci1',
                'idnpwp' => $idnpwp
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

		return $result;
    }
    public function getAllWajibPajakbyID($idnpwp){
        /*$this->db->query("SET sql_mode = '' ");
        return $this->db->get_where('wajibpajak',['idnpwp'=> $idnpwp])->row_array();*/

        $response = $this->_client->request('GET', 'wajib_pajak', [
			'query' => [
                'kunci' => 'kunci1',
                'idnpwp' => $idnpwp
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'][0];

    }
    public function ubahwjbp()
    {
        $this->db->query("SET sql_mode = '' ");
        $data=[
            "nama"=> $this->input->post('nama',true),
            "idobjekpajakfk" =>$this->input->post('idobjekpajakfk',true),            
            "namalengkap"=> $this->input->post('namalengkap',true),
            "alamat"=> $this->input->post('alamat',true),
            "notelp"=> $this->input->post('notelp',true),
            "password"=> $this->input->post('password',true),
            "idnpwp"=> $this->input->post('idnpwp',true),
            'kunci' => 'kunci1'
        ];
        /*$this->db->where('idnpwp',$this->input->post('idnpwp'));
        return $this->db->update('wajibpajak',$data);*/

        $response = $this->_client->request('PUT', 'wajib_pajak',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }






    public function cariDataWajibPajak()
    {
        $this->db->query("SET sql_mode = '' ");
        $keyword=$this->input->post('keyword');
        $this->db->like('nama',$keyword);
        return $this->db->get('wajibpajak')->result_array();
    }
}

/* End of file mahasiswa_model.php */
/* Location: ./application/models/mahasiswa_model.php */
?>