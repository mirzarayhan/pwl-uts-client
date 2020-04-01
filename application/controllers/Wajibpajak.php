<?php
defined('BASEPATH') or exit('No direct script access allowed');

class wajibpajak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('wajibpajak_model');
		$this->load->library("form_validation");
		if ($this->session->userdata('level') == 3) {
			redirect('login_control/index', 'refresh');
		}
	}

	public function indexwajibpajak()
	{
		if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
			$data['title'] = 'List Wajib Pajak';
			$data['wajibpajak'] = $this->wajibpajak_model->getAllWajibPajak();
			if ($this->input->post('keyword')) {
				$data['wajibpajak'] = $this->wajibpajak_model->cariDataWajibPajak();
			}
			$this->load->view('template/header', $data);
			$this->load->view('wajibpajak/indexwajibpajak', $data);
			$this->load->view('template/footer');
		} else {
			redirect('login_control');
		}
	}

	public function tambah()
	{
		$data['title'] = 'Form Menambahkan Data Wajib Pajak';
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('idobjekpajakfk', 'Idobjekpajakfk', 'required');
		$this->form_validation->set_rules('notelp', 'notelp', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('template/header', $data);
			$this->load->view('wajibpajak/tambahwajibpajak', $data);
			$this->load->view('template/footer');
		} else {
			$this->wajibpajak_model->tambahdatawjbp();
			$this->session->set_flashdata('flash-data', 'ditambahkan');
			redirect('wajibpajak/indexwajibpajak', 'refresh');
		}
	}

	public function hapus($idnpwp)
	{
		# code...
		$this->wajibpajak_model->hapusdatawjbp($idnpwp);
		$this->session->set_flashdata('flash-data', 'dihapus');
		redirect('wajibpajak/indexwajibpajak', 'refresh');
	}

	public function detail($idnpwp)
	{
		# code...
		$data['title'] = 'Detail wajib Pajak';
		$data['wajibpajak'] = $this->wajibpajak_model->getAllWajibPajakbyID($idnpwp);
		$this->load->view('template/header', $data);
		$this->load->view('wajibpajak/detailwajibpajak', $data);
		$this->load->view('template/footer');
	}
	public function edit($idnpwp)
	{
		# code...
		$data['title'] = 'Form Edit Data Wajib Pajak';
		$data['wajibpajak'] = $this->wajibpajak_model->getAllWajibPajakbyID($idnpwp);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('idobjekpajakfk', 'Idobjekpajakfk');
		$this->form_validation->set_rules('notelp', 'notelp', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('wajibpajak/editwajibpajak', $data);
			$this->load->view('template/footer');
		} else {
			$this->wajibpajak_model->ubahwjbp();
			$this->session->set_flashdata('flash-data', 'diedit');
			redirect('wajibpajak/indexwajibpajak', 'refresh');
		}
	}

	
}

/* End of file wajibpajak.php */
/* Location: ./application/controllers/wajibpajak.php */
