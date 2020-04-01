<?php
defined('BASEPATH') or exit('No direct script access allowed');

class petugaspajak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugaspajak_model');
		$this->load->library("form_validation");
		if ($this->session->userdata('level') == 3) {
			redirect('login_control/index', 'refresh');
		}
		//$this->load->database();
	}

	public function index()
	{

		if ($this->session->userdata('level') == 2) {
			$data['title'] = 'List petugas Pajak';
			$data['petugaspajak'] = $this->petugaspajak_model->getAllPetugasPajak();
			if ($this->input->post('keyword')) {
				$data['petugaspajak'] = $this->petugaspajak_model->cariDataPetugasPajak();
			}
			$this->load->view('template/header', $data);
			$this->load->view('petugaspajak/indexpetugaspajak', $data);
			$this->load->view('template/footer');
		} else {
			redirect('login_control');
		}
	}


	public function tambah()
	{
		$data['title'] = 'Form Menambahkan Data Wajib Pajak';
		$this->form_validation->set_rules('namapetugas', 'Namapetugas', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('template/header', $data);
			$this->load->view('petugaspajak/tambahpetugaspajak', $data);
			$this->load->view('template/footer');
		} else {
			$this->petugaspajak_model->tambahdataptgp();
			$this->session->set_flashdata('flash-data', 'ditambahkan');
			redirect('petugaspajak', 'refresh');
		}
	}

	public function hapus($idpetugas)
	{
		# code...
		$this->petugaspajak_model->hapusdataptgp($idpetugas);
		$this->session->set_flashdata('flash-data', 'dihapus');
		redirect('petugaspajak', 'refresh');
	}
	public function cariDataPetugasPajak()
	{
		# code...
		$keyword = $this->input->post('keyword');
		$this->db->like('namapetugas', $keyword);
		return $this->db->get('petugaspajak')->result_array();
	}
	/*public function detail($idnpwp)
        {
            # code...
            $data['title']='Detail wajib Pajak'; 
            $data['wajibpajak']=$this->wajibpajak_model->getAllWajibPajakbyID($idnpwp);
            $this->load->view('template/header',$data);
            $this->load->view('wajibpajak/detailwajibpajak',$data);
            $this->load->view('template/footer');
		}*/
	public function edit($idpetugas)
	{
		# code...
		$data['title'] = 'Form Edit Data Wajib Pajak';
		$data['petugaspajak'] = $this->petugaspajak_model->getAllPetugasPajakbyID($idpetugas);

		$this->form_validation->set_rules('namapetugas', 'Namapetugas', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('notelp', 'notelp', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('petugaspajak/editpetugaspajak', $data);
			$this->load->view('template/footer');
		} else {
			$this->petugaspajak_model->ubahptgp();
			$this->session->set_flashdata('flash-data', 'diedit');
			redirect('petugaspajak/indexpetugaspajak', 'refresh');
		}
	}



	/* End of file wajibpajak.php */
	/* Location: ./application/controllers/wajibpajak.php */
}
