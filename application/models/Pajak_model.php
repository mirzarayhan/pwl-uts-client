<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;
class Pajak_model extends CI_Model {

    private $_client;

    public function __construct() {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/intipajak_rest/api/',
        ]);

    }

	public function getAllObjekPajak()
	{
        /*$this->db->query("SET sql_mode = '' ");        
        return $this->db->get('objekpajak')->result_array();*/

		$response = $this->_client->request('GET', 'objek_pajak', [
			'query' => [
				'kunci' => 'kunci1',
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'];
	}
	function tambahdataobjp(){
        $this->db->query("SET sql_mode = '' ");
        $data=[
        	"merk"=> $this->input->post('merk',true),
        	"nomorplat"=> $this->input->post('noplat',true),
        	"besarpajak"=> $this->input->post('besarpajak',true),
            "jeniskendaraan"=> $this->input->post('jeniskendaraan',true),
            "warna" => $this->input->post('warna'),
            "tahun" => $this->input->post('tahun'),
            "masa_stnk" => $this->input->post('masa_stnk'),
            'kunci' => 'kunci1'
        ];
        
        //$this->db->insert('objekpajak', $data);

        $response = $this->_client->request('POST', 'objek_pajak',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}
	public function hapusdataobjp($idobjekpajak) {
        /*$this->db->query("SET sql_mode = '' ");	    
		$this->db->where('idobjekpajak', $idobjekpajak);
        $this->db->delete('objekpajak');*/
        
        $response = $this->_client->request('DELETE', 'objek_pajak',[
            'form_params' => [
                'kunci' => 'kunci1',
                'idobjekpajak' => $idobjekpajak
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
	public function getAllObjekPajakbyID($idobjekpajak){
        /*$this->db->query("SET sql_mode = '' ");
		return $this->db->get_where('objekpajak',['idobjekpajak'=> $idobjekpajak])->row_array();*/

		$response = $this->_client->request('GET', 'objek_pajak', [
			'query' => [
                'kunci' => 'kunci1',
                'idobjekpajak' => $idobjekpajak
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'][0];
	}
	public function ubahobjp()
        {
        $this->db->query("SET sql_mode = '' ");
            $data=[

                "merk"=> $this->input->post('merk',true),
                "nomorplat"=> $this->input->post('noplat',true),
                "besarpajak"=> $this->input->post('besarpajak',true),
                "jeniskendaraan"=> $this->input->post('jeniskendaraan',true),
                "idobjekpajak"=> $this->input->post('idobjekpajak',true),
                "warna" => $this->input->post('warna'),
                "tahun" => $this->input->post('tahun'),
                "masa_stnk" => $this->input->post('masa_stnk'),
                'kunci' => 'kunci1'

            ];

            /*$this->db->where('idobjekpajak',$this->input->post('idobjekpajak'));
            return $this->db->update('objekpajak',$data);*/
            $response = $this->_client->request('PUT', 'objek_pajak',[
                'form_params' => $data
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;


        }
    
        
    //bisa dikatakan dibawah ini belum ada fungsi di APInya
	public function cariDataObjekPajak()
    {
        $this->db->query("SET sql_mode = '' ");
        $keyword=$this->input->post('keyword');
        $this->db->like('nomorplat',$keyword);
        return $this->db->get('objekpajak')->result_array();
    }
}

/* End of file mahasiswa_model.php */
/* Location: ./application/models/mahasiswa_model.php */
?>