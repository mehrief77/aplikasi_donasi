<?php

class Dashboard_dkm extends CI_Controller
{

    // sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id_role') != '1') {
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

        $data['admin'] = $this->Model_admin->tampil_data()->result();
        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_dkm/Topbar', $data);
        // $this->load->view('dkm/Dashboard_admin', $data);
        $this->load->view('dkm/Dashboard_dkm', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function data_donatur()
    {
        $data['title'] = 'Data Donatur';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['donatur'] = $this->Model_donatur->tampil_data()->result();
        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_dkm/Topbar', $data);
        $this->load->view('dkm/D_donatur', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function tambah_donatur()
    {
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $no_wa      = $this->input->post('no_wa');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $gambar     =  $_FILES['gambar']['name'];

        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama'       => $nama,
            'alamat'     => $alamat,
            'no_wa'      => $no_wa,
            'email'      => $email,
            'password'   => $password,
            'gambar'     => $gambar,
        );

        $this->Model_donatur->tambah_donatur($data, 'tbl_donatur');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Customer Success!!</div>');
        redirect('dkm/Dashboard_dkm/data_donatur');
    }


    public function detail_donatur($id)
    {
        $data['title'] = 'Detail Donatur';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_dnt' => $id);
        $data['donatur'] = $this->Model_donatur->detail_donatur($id);
        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_dkm/Topbar', $data);
        $this->load->view('dkm/Detail_donatur', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function edit_donatur($id_dnt)
    {
        $data['title'] = 'Detail Donatur';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $where = $id;
        $where = $id_dnt;
        $data['donatur'] = $this->Model_donatur->edit_donatur($where);

        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('dkm/Edit_donatur', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function update_donator()
    {
        $id            = $this->input->post('id_dnt');
        $nama          = $this->input->post('nama');
        $email         = $this->input->post('email');
        $alamat        = $this->input->post('alamat');
        $no_wa         = $this->input->post('no_wa');
        $password      = $this->input->post('password');

        $gambar        =  $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path']   = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Logo Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }


        $data = array(
            'nama'         => $nama,
            'alamat'       => $alamat,
            'no_wa'        => $no_wa,
            'password'     => $password,
            'gambar'       => $gambar,
            'email'        => $email
        );

        $where = array(
            'id_dnt' => $id
        );

        if ($this->Model_donatur->update_donatur($where, $data, 'tbl_donatur')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Donatur Success!!</div>');
            redirect('dkm/Dashboard_dkm/data_donatur');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Donatur Gagal!!</div>');
            redirect('dkm/Dashboard_dkm/data_donatur');
        }
    }

    public function hapus_donatur($id)
    {
        $where = array('id_dnt' => $id);
        $this->Model_donatur->hapus_donatur($where, 'tbl_donatur');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Donatur Success!!</div>');
        redirect('dkm/Dashboard_dkm/data_donatur');
    }



    public function data_admin()
    {
        $data['title'] = 'Data Admin';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->Model_admin->tampil_data()->result();
        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_dkm/Topbar', $data);
        $this->load->view('dkm/D_admin', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function tambah_admin()
    {
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $no_wa      = $this->input->post('no_wa');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $gambar     =  $_FILES['gambar']['name'];

        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama'       => $nama,
            'alamat'     => $alamat,
            'no_wa'      => $no_wa,
            'email'      => $email,
            'password'   => $password,
            'gambar'     => $gambar,
        );

        $this->Model_admin->tambah_admin($data, 'tbl_admin');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Customer Success!!</div>');
        redirect('dkm/Dashboard_dkm/data_admin');
    }


    public function detail_admin($id)
    {
        $data['title'] = 'Detail Admin';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_adm' => $id);
        $data['admin'] = $this->Model_admin->detail_admin($id);
        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('dkm/Detail_admin', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function edit_admin($id)
    {
        $data['title'] = 'Edit admin';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_adm' => $id);
        $data['admin'] = $this->Model_admin->edit_admin($where, 'tbl_admin')->result();
        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('dkm/Edit_admin', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function update_admin()
    {
        $id            = $this->input->post('id_adm');
        $nama          = $this->input->post('nama');
        $email         = $this->input->post('email');
        $alamat        = $this->input->post('alamat');
        $no_wa         = $this->input->post('no_wa');
        $password      = $this->input->post('password');

        $gambar        =  $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path']   = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Logo Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }


        $data = array(
            'nama'         => $nama,
            'alamat'       => $alamat,
            'no_wa'        => $no_wa,
            'password'     => $password,
            'gambar'       => $gambar,
            'email'        => $email
        );

        $where = array(
            'id_adm' => $id
        );

        if ($this->Model_admin->update_admin($where, $data, 'tbl_admin')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Donatur Success!!</div>');
            redirect('dkm/Dashboard_dkm/data_admin');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Donatur Gagal!!</div>');
            redirect('dkm/Dashboard_dkm/data_admin');
        }
    }

    public function hapus_admin($id)
    {
        $where = array('id_adm' => $id);
        $this->Model_admin->hapus_admin($where, 'tbl_admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Donatur Success!!</div>');
        redirect('dkm/Dashboard_dkm/data_admin');
    }

    public function data_donasi()
    {
        $data['title'] = 'Data Donasi';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['donasi'] = $this->Model_admin->tampil_donasi();
        $this->load->view('templates_dkm/Header', $data);
        $this->load->view('templates_dkm/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('dkm/D_donasi', $data);
        $this->load->view('templates_dkm/Footer');
    }

    public function hapus_donasi($id_donasi)
    {
        $where = array('id_donasi' => $id_donasi);
        $this->Model_admin->hapus_donasi($where, 'tbl_donasi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Donasi Success!!</div>');
        redirect('dkm/Dashboard_dkm/data_donasi');
    }

    public function cetak_laporan($id_donasi)
    {
        $data['donasi'] = $this->Model_admin->laporan_donasi($id_donasi);
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('admin/laporan_donasi', $data);
    }
}
