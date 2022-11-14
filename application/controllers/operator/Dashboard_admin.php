<?php

class Dashboard_admin extends CI_Controller
{

    // sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id_role') != '2') {
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
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/Dashboard_admin', $data);
        $this->load->view('templates_a/Footer');
    }

    public function data_donatur()
    {
        $data['title'] = 'Data Donatur';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['donatur'] = $this->Model_donatur->tampil_data()->result();
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/D_donatur', $data);
        $this->load->view('templates_a/Footer');
    }

    // public function tambah_donatur()
    // {
    //     $nama       = $this->input->post('nama');
    //     $alamat     = $this->input->post('alamat');
    //     $no_wa      = $this->input->post('no_wa');
    //     $email      = $this->input->post('email');
    //     $password   = $this->input->post('password');
    //     $gambar     =  $_FILES['gambar']['name'];

    //     if ($gambar = '') {
    //     } else {
    //         $config['upload_path'] = './uploads';
    //         $config['allowed_types'] = 'jpg|jpeg|png|gif';

    //         $this->load->library('upload', $config);
    //         if (!$this->upload->do_upload('gambar')) {
    //             echo "Gambar Gagal Diupload!";
    //         } else {
    //             $gambar = $this->upload->data('file_name');
    //         }
    //     }

    //     $this->load->library('ciqrcode'); //pemanggilan library QR CODE

    //     $config['cacheable']    = true; //boolean, the default is true
    //     $config['cachedir']     = './assets/'; //string, the default is application/cache/
    //     $config['errorlog']     = './assets/'; //string, the default is application/logs/
    //     $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
    //     $config['quality']      = true; //boolean, the default is true
    //     $config['size']         = '1024'; //interger, the default is 1024
    //     $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
    //     $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
    //     $this->ciqrcode->initialize($config);

    //     $image_name = $email . '.png'; //buat name dari qr code sesuai dengan nim

    //     $params['data'] = $email; //data yang akan di jadikan QR CODE
    //     $params['level'] = 'H'; //H=High
    //     $params['size'] = 10;
    //     $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    //     $this->ciqrcode->generate($params);

    //     $data_user = array(
    //         'nama'       => $nama,
    //         'email'      => $email,
    //         'password'   => $password,
    //         'id_role'      => 3,
    //         'is_active' => 1,
    //         'date_created' => date("Y-m-d"),
    //         'gambar'       => $gambar,
    //     );

    //     $this->db->insert('tbl_user', $data_user);

    //     $user = $this->Model_admin->getuser()->result();
    //     $id_user = $user[0]->id;

    //     $data = array(
    //         'nama'       => $nama,
    //         'alamat'     => $alamat,
    //         'no_wa'      => $no_wa,
    //         'email'      => $email,
    //         'password'   => $password,
    //         'gambar'     => $gambar,
    //         'qr_code'    => $image_name,
    //         'id_user'    => $id_user,
    //     );

    //     $this->db->insert('tbl_donatur', $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Customer Success!!</div>');
    //     redirect('operator/Dashboard_admin/data_donatur');
    // }

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

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $email . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $email; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params);

        $data_user = array(
            'nama'       => $nama,
            'email'      => $email,
            'password'   => $password,
            'id_role'      => 3,
            'is_active' => 1,
            'date_created' => date("Y-m-d"),
            'gambar'       => $gambar,
        );

        $this->db->insert('tbl_user', $data_user);

        $user = $this->Model_admin->getuser()->result();
        $id_user = $user[0]->id;

        $data = array(
            'nama'       => $nama,
            'alamat'     => $alamat,
            'no_wa'      => $no_wa,
            'email'      => $email,
            'password'   => $password,
            'gambar'     => $gambar,
            'qr_code'    => $image_name,
            'id_user'    => $id_user,
        );

        $this->db->insert('tbl_donatur', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Customer Success!!</div>');
        redirect('operator/Dashboard_admin/data_donatur');
    }


    public function detail_donatur($id)
    {
        $data['title'] = 'Detail Donatur';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_dnt' => $id);
        $data['donatur'] = $this->Model_donatur->detail_donatur($id);
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/Detail_donatur', $data);
        $this->load->view('templates_a/Footer');
    }

    // public function edit_donatur($id)
    public function edit_donatur($id_dnt)
    {
        $data['title'] = 'Detail Donatur';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $where = $id;
        $where = $id_dnt;
        $data['donatur'] = $this->Model_donatur->edit_donatur($where);

        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/Edit_donatur', $data);
        $this->load->view('templates_a/Footer');
    }

    public function update_donator()
    {
        $id            = $this->input->post('id_dnt');
        $nama          = $this->input->post('nama');
        $email         = $this->input->post('email');
        $alamat        = $this->input->post('alamat');
        $no_wa         = $this->input->post('no_wa');
        $password      = $this->input->post('password');
        // $id_user       = $this->input->post('id_user');
        $id_user       = $this->input->post('id');

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

        $data_user = array(
            'nama'       => $nama,
            'email'      => $email,
            'password'   => $password,
            'gambar'     => $gambar,
        );


        $data = array(
            'nama'         => $nama,
            'alamat'       => $alamat,
            'no_wa'        => $no_wa,
            'password'     => $password,
            'gambar'       => $gambar,
            'email'        => $email
        );

        $this->db->where('id', $id_user);
        $this->db->update('tbl_user', $data_user);

        $this->db->where('id_dnt', $id);

        if ($this->db->update('tbl_donatur', $data)) {
            // if ($this->Model_donatur->update_donatur($where, $data, 'tbl_donatur')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Donatur Success!!</div>');
            redirect('operator/Dashboard_admin/data_donatur');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Donatur Gagal!!</div>');
            redirect('operator/Dashboard_admin/data_donatur');
        }
    }

    public function hapus_donatur($id)
    {
        $where = array('id_dnt' => $id);
        $this->Model_donatur->hapus_donatur($where, 'tbl_donatur');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Donatur Success!!</div>');
        redirect('operator/Dashboard_admin/data_donatur');
    }



    public function data_admin()
    {
        $data['title'] = 'Data Admin';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->Model_admin->tampil_data()->result();
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/D_admin', $data);
        $this->load->view('templates_a/Footer');
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
        redirect('operator/Dashboard_admin/data_admin');
    }


    public function detail_admin($id)
    {
        $data['title'] = 'Detail Admin';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_adm' => $id);
        $data['admin'] = $this->Model_admin->detail_admin($id);
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/Detail_admin', $data);
        $this->load->view('templates_a/Footer');
    }

    public function edit_admin($id)
    {
        $data['title'] = 'Edit admin';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_adm' => $id);
        $data['admin'] = $this->Model_admin->edit_admin($where, 'tbl_admin')->result();
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/Edit_admin', $data);
        $this->load->view('templates_a/Footer');
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
            redirect('operator/Dashboard_admin/data_admin');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Donatur Gagal!!</div>');
            redirect('operator/Dashboard_admin/data_admin');
        }
    }

    public function hapus_admin($id)
    {
        $where = array('id_adm' => $id);
        $this->Model_admin->hapus_admin($where, 'tbl_admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Donatur Success!!</div>');
        redirect('operator/Dashboard_admin/data_admin');
    }

    public function scan_qrcode()
    {
        $data['title'] = 'Scan QRCode';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->Model_admin->tampil_data()->result();
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        $this->load->view('admin/scan_qrcode', $data);
        $this->load->view('templates_a/Footer');
    }

    public function tambah_donasi()
    {
        $email_donatur       = $this->input->post('email_donatur');
        $jumlah_donasi       = $this->input->post('jumlah_donasi');
        $tgl_donasi       = $this->input->post('tgl_donasi');
        $id_admin = $this->session->userdata('id_adm');
        $nama_admin = $this->session->userdata('nama');
        $nama_dkm = $this->session->userdata('nama_dkm');
        $tgl_report = date("d-M-Y");
        // var_dump($id_admin);
        // die;
        $data = array(
            'email_donatur'       => $email_donatur,
            'nominal'     => $jumlah_donasi,
            'tgl_donasi' => $tgl_donasi,
            'status_donasi'      => "Diterima",
            'id_admin' => $id_admin
        );

        // var_dump($data);
        // die();

        // $this->Model_admin->tambah_donasi($data, 'tbl_donasi');
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Donasi Success!!</div>');
        // redirect('operator/Dashboard_admin/scan_qrcode');

        $this->Model_admin->tambah_donasi($data, 'tbl_donasi');

        $config = [
            'protocol'  => 'smtp',
            // 'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'toufanhidayat07@gmail.com',
            'smtp_pass' => 'toufan123',
            'smtp_port' => '465',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


        // memanggil library email dan membutuhkan parameternya di ci
        $this->load->library('email', $config);
        // sintax ini utuk mengirim email aktiv dari registrasi yg baru di buat!!!!
        $this->email->initialize($config);

        $this->email->from('toufanhidayat07@gmail.com', 'DEWAN KEMAKMURAN MASJID
        RIYADHUS SHALIHIN');
        $this->email->to($email_donatur);
        // $this->email->to('nurulraws@gmail.com');

        // verify ini sama dengan yg ada di atas(sendEmail), cek verifikasi

        $this->email->subject('Laporan Donasi');
        $htmlContent = ' 
                <html> 
                <head> 
                    <style>
                        #nav {
                            width:100%;
                            height:80px;
                            background-color:#F8FAFC; 
                        }

                        #header {
                            color:#BBBFC3;
                            margin-left:390px !important;
                            padding-top:25px !important;
                            font-family: Merriweather, serif;
                            font-weight: 700;
                            font-size: 28px;
                            line-height: 34px;
                        }

                        #otp {
                            color:#BBBFC3;
                            margin-left:390px !important;
                            padding-top:-10px !important;
                            font-family: Merriweather, serif;
                            font-weight: 700;
                            font-size: 28px;
                            line-height: 34px;
                        }

                        #desc {
                            margin-left:390px !important;
                            color:black;
                        }

                        #bg-btn{
                            width:190px;
                            height:45px;
                            background-color:#244295; 
                            border-radius:5px; 
                            margin-left:510px !important;
                            margin-top:-30px !important;
                        }

                        #btn {
                            color:white;
                            font-size:20px !important;
                            text-decoration:none;
                            margin-top:-50px !important;
                            padding-top:5px !important;
                            padding-left:18px !important;
                            font-family: Merriweather, serif;
                            font-weight: 700;
                            font-size: 28px;
                            line-height: 34px;
                            display:block;
                        }

                        #desc-1 {
                            margin-left:390px !important;
                            color:black;
                            margin-top:-50px !important;
                        }

                        #desc-2 {
                            margin-left:200px !important;
                            color:black;
                        }

                        #footer {
                            margin-left:390px !important;
                            color:#0F0E20;
                        }
                    </style>

                </head> 
                <body>
                    <h1 style="color:black;margin-left:170px !important">DEWAN KEMAKMURAN MASJID RIYADHUS SHALIHIN</h1><br> 
                    <h4 style="color:black;margin-left:170px !important">Kepada donatur ' . $email_donatur . ' yang terhormat, dengan ini kami menyampaikan hasil laporan keuangan:</h4>
                    <br>
                    <h4 id="desc" >Tanggal Donasi: ' . $tgl_donasi . '</h4> 
                    <h4 id="desc" >Email: ' . $email_donatur . '</h4> 
                    <h4 id="desc" >Nominal: Rp. ' .  number_format($jumlah_donasi, 0, '', '.') . '</h4> 
                    <h4 id="desc" >Status Donasi: Diterima</h4> 
                    <h4 id="desc" >Diproses Oleh: ' . $nama_admin . '</h4> 
                    <h4 id="desc-1" style="text-align:right">Bekasi, ' . $tgl_report . '</h4>
                    <h4 id="desc-1" style="text-align:right">DKM Masjid Riyadhus Shalihin</h4><br><br><br><br>
                    <h4 id="desc-1" style="text-align:right">' . $nama_admin . '</h4>
                    
                
                </body> 
                </html>';
        // $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');  //sintax ini utk membuat link aktivasi ke gmail
        $this->email->message($htmlContent);  //sintax ini utk membuat link aktivasi ke gmail

        if ($this->email->send()) {
            // return true;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Donasi Success!!</div>');
            return redirect('operator/Dashboard_admin/scan_qrcode');
        } else {
            // echo $this->email->print_debugger();
            // die;
            echo $this->email->print_debugger();
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Donasi Success!!</div>');
        redirect('operator/Dashboard_admin/scan_qrcode');
    }

    public function data_donasi()
    {
        $data['title'] = 'Data Donasi';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['donasi'] = $this->Model_admin->tampil_donasi();
        $this->load->view('templates_a/Header', $data);
        $this->load->view('templates_a/Sidebar', $data);
        // $this->load->view('templates_a/Topbar', $data);
        $this->load->view('admin/D_donasi', $data);
        $this->load->view('templates_a/Footer');
    }

    public function hapus_donasi($id_donasi)
    {
        $where = array('id_donasi' => $id_donasi);
        $this->Model_admin->hapus_donasi($where, 'tbl_donasi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Donasi Success!!</div>');
        redirect('operator/Dashboard_admin/data_donasi');
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
