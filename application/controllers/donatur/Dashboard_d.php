<?php

class Dashboard_d extends CI_Controller
{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulukkk!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}


	public function index()
	{
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['donatur'] = $this->Model_donatur->tampil_data()->result();
		$this->load->view('templates_d/Header', $data);
		$this->load->view('templates_d/Sidebar', $data);
		// $this->load->view('templates_d/Topbar', $data);
		$this->load->view('donatur/Dashboard_d', $data);
		$this->load->view('templates_d/Footer');
	}

	public function profile()
	{
		$data['title'] = 'My Profile';
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['donatur'] = $this->db->get_where('tbl_donatur', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates_d/Header', $data);
		$this->load->view('templates_d/Sidebar');
		// $this->load->view('templates_d/Topbar', $data);
		$this->load->view('donatur/Profile', $data);
		$this->load->view('templates_d/Footer');
	}

	public function edit()
	{
		$data['title']     = 'Edit Profile Customer';
		$data['tbl_user'] = $this->db->get_where('tbl_donatur', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['donatur'] = $this->db->get_where('tbl_donatur', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Full Name', 'required|trim');  // membuat rules utk name
		if ($this->form_validation->run() == false) {   //membuat form_validation.
			$this->load->view('templates_d/Header', $data);
			$this->load->view('templates_d/Sidebar');
			// $this->load->view('templates_d/Topbar', $data);
			$this->load->view('donatur/Edit', $data);
			$this->load->view('templates_d/Footer');
		} else {
			$nama     = $this->input->post('nama');     // $id_customer = $this->input->post('id_customer');
			$alamat   = $this->input->post('alamat');
			$no_wa  = $this->input->post('no_wa');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$upload_image = $_FILES['gambar']['name'];      // cek jika ada gambar yg akan diupload
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path']   = 'uploads/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$old_image = $data['customer']['gambar'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . '/assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->set('alamat', $alamat);
			$this->db->set('no_wa', $no_wa);
			$this->db->where('email', $email);
			$this->db->set('password', $password);
			$this->db->update('tbl_donatur');

			$this->db->where('email', $email);
			$this->db->set('password', $password);
			$this->db->update('tbl_user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
			redirect('donatur/Dashboard_d/profile');
		}
	}

	public function data_donasi()
	{
		$data['title'] = 'Data Donasi';
		$email_donatur = $this->session->userdata('email');
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['donasi'] = $this->Model_donatur->tampil_donasi($email_donatur);
		// var_dump($data['donasi']);
		// die();
		$this->load->view('templates_d/Header', $data);
		$this->load->view('templates_d/Sidebar', $data);
		// $this->load->view('templates_a/Topbar', $data);
		$this->load->view('donatur/D_donasi', $data);
		$this->load->view('templates_d/Footer');
	}
}
