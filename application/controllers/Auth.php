<?php

class Auth extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->library('form_validation');
    // }


    public function index()
    {
        //membuat rules utk email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        // membuat rules utk password
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templateslogin/header', $data);
            $this->load->view('Form_login');
            $this->load->view('templateslogin/footer');
        } else {
            // validasinya success
            $this->login();
        }
    }


    // public function pilih()
    // {
    //     $data['title'] = "Pilih Register";
    //     $this->load->view('templateslogin/Header', $data);
    //     $this->load->view('Pilih_registrasi');
    //     // $this->load->view('templateslogin/Footer');
    // }

    public function login()
    {
        $data['title'] = 'Halaman Login';
        // membuat form validation untuk username dan password
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email wajib diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templateslogin/Header', $data);
            $this->load->view('Form_login');
            $this->load->view('templateslogin/Footer');
        } else {
            $auth = $this->Model_auth->cek_login();

            // $auth_customer = $this->Model_auth->cek_donatur();
            $auth_donatur = $this->Model_auth->cek_donatur();


            if ($auth->is_active == "0") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Email Belum Diaktifkan Silahkan aktifkan!!!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                redirect('Auth/login');
                // die();
            }

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Email atau Password Anda Salah!!!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                redirect('Auth/login');
            } else {
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('id_role', $auth->id_role);
                $this->session->set_userdata('is_login', true);

                if ($auth->id_role == "1") {
                    $cek = $this->Model_auth->data_level_1($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('nama', $val->nama);
                    }
                    redirect('dkm/Dashboard_dkm');
                } else if ($auth->id_role == "2") {
                    $cek = $this->Model_auth->data_level_2($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('id_adm', $val->id_adm);
                        $this->session->set_userdata('nama', $val->nama);
                    }
                    redirect('operator/Dashboard_admin');
                } else if ($auth->id_role == "3") {
                    $cek = $this->Model_auth->data_level_3($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('id_dnt', $val->id_dnt);
                        $this->session->set_userdata('nama', $val->nama);
                        $this->session->set_userdata('email', $val->email);
                        $this->session->set_userdata('alamat', $val->alamat);
                        $this->session->set_userdata('no_wa', $val->no_wa);
                    }
                    $this->session->set_userdata('id_dnt', $auth_donatur->id_dnt);
                    // $this->session->set_userdata('id', $auth_donatur->id);
                    redirect(base_url('donatur/Dashboard_d'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Username atau Password Anda Salah!!!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    redirect('Auth/login');
                }
            }
        }
    }


    public function registration()
    {
        // membuat rules
        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_wa', 'No Whatsapp', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Foto', 'required');
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templateslogin/Header', $data);
            $this->load->view('Form_registrasi');
            $this->load->view('templateslogin/Footer');
        } else {
            $email = $this->input->post('email', true);
            $gambar         =  $_FILES['gambar']['name'];
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

            $data = [
                'email'        => htmlspecialchars($email),
                'nama'         => htmlspecialchars($this->input->post('nama', true)),
                'password'     => $this->input->post('password1'),
                'id_role'      => 3,
                // 'is_active' => 1,
                'is_active'    => 0,
                'date_created' => time(),
                // 'date_created' => date("Y-m-d"),
                'gambar'       => $gambar,
            ];

            $email = $this->input->post('email', true);
            $data_tbl_dnt = [
                'nama'           => htmlspecialchars($this->input->post('nama', true)),
                'email'          => htmlspecialchars($email),
                'alamat'         => $this->input->post('alamat'),
                'no_wa'          => $this->input->post('no_wa'),
                'password'       => $this->input->post('password1'),
                'gambar'         => $gambar,
                'qr_code'        => $image_name,
            ];

            // menyiapkan token dan dibungkus dengan base64_encode
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'        => $email,
                'token'        => $token,
                // 'date_created' => date("Y-m-d"), 
                'date_created' => time(),

            ];

            $this->db->insert('tbl_user', $data);
            $this->db->insert('tbl_donatur', $data_tbl_dnt);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');    // verify dpt darimana?
            // setelah data di insert, sistem akan mengirim email yg baru registrasi melalui parameter
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congluratulaion! your account has been created. PLEASE ACTIVATE YOUR ACCOUNT</div>');
            redirect('Auth/login');
        }
    }



    // public function registration_donatur()
    // {
    //     // $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    //     $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
    //         'is_unique' => 'This email has already registered!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
    //         'matches'    => 'Password dont match!',
    //         'min_length' => 'Password too short!'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Registration Customer';
    //         $this->load->view('templateslogin/Header', $data);
    //         $this->load->view('Form_registration_pelanggan');
    //         $this->load->view('templateslogin/Footer');
    //     } else {
    //         $email = $this->input->post('email', true);
    //         $data = [
    //             'email' => htmlspecialchars($email),
    //             // 'name' => htmlspecialchars($this->input->post('name', true)),
    //             'nama' => htmlspecialchars($this->input->post('name', true)),
    //             'gambar' => 'default.jpg',
    //             'password' => $this->input->post('password1'),
    //             // 'role_id' => 3,
    //             'id_role' => 3,
    //             // 'is_active' a/ on off pada login jika 0 mati, jika 1 hidup,
    //             'is_active' => 0,
    //             // 'is_active' => 1,
    //             'date_created' => time()
    //         ];

    //         //Tambahin seperti $data diatas
    //         $email = $this->input->post('email', true);
    //         $data_tb_customer = [
    //             'nama' => htmlspecialchars($this->input->post('name', true)),
    //             'alamat' => $this->input->post('alamat'),
    //             'no_telp' => $this->input->post('no_telp'),
    //             'email' => htmlspecialchars($email),
    //             'password' => $this->input->post('password1'),
    //             'gambar' => 'default.jpg',
    //             // 'role_id' => 2,
    //             // 'is_active' => 1,
    //             // 'is_active' => 0,
    //             // 'date_created' => time()
    //         ];

    //         // menyiapkan token dan dibungkus dengan base64_encode
    //         $token = base64_encode(random_bytes(32));
    //         $user_token = [
    //             'email' => $email,
    //             'token' => $token,
    //             'date_created' => time()
    //         ];

    //         // menambahkan data pada saat user registrasi ke table user
    //         $this->db->insert('tb_user', $data);
    //         $this->db->insert('tb_customer', $data_tb_customer);
    //         $this->db->insert('user_token', $user_token);
    //         $this->_sendEmail($token, 'verify');    // verify dpt darimana?
    //         // setelah data di insert, sistem akan mengirim email yg baru registrasi melalui parameter
    //         // $this->_sendEmail($token, 'verify');
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congluratulaion! your account has been created. PLEASE ACTIVATE YOUR ACCOUNT</div>');
    //         redirect('Auth/login');
    //     }
    // }


    private function _sendEmail($token, $type)
    {
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

        $this->email->from('toufanhidayat07@gmail.com', 'Toufan Hidayat');
        $this->email->to($this->input->post('email'));

        // verify ini sama dengan yg ada di atas(sendEmail), cek verifikasi
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');  //sintax ini utk membuat link aktivasi ke gmail
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset you password : <a href="' . base_url() . 'auth/resetpassword?email=' .
                $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');  //sintax ini utk membuat link aktivasi ke gmail
        }

        if ($this->email->send()) {
            return true;
        } else {
            // echo $this->email->print_debugger();
            // die;
            echo $this->email->print_debugger();
        }
    }

    // function ini yg akan melakukan verifikasi terhadap link yg dikirim dari email, tentang nomer token dan email didatabase(user_token)
    public function verify()
    {
        $email = $this->input->get('email');     //ngambil data yg ada di database melalui input 
        $token = $this->input->get('token');
        $token = substr($token, 0, 30);
        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();     // membuat variabel(inisial $user_token) dan mengambil data token dari tabel user_token. 

            if ($user_token) {
                // var_dump($user_token['date_created']);
                // die();
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) { //utk mengecek waktu saat aktivasi expired atau tdk, 
                    $this->db->set('is_active', 1);   //jika menggunakan query bilder, merubah is_aktive dari 0 menjadi 1.
                    $this->db->where('email', $email);
                    $this->db->update('tbl_user');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('Auth');
                } else {
                    $this->db->delete('tbl_user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! TOKEN EXPIRED!!!.</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! WRONG TOKEN!!!.</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! WRONG EMAIL!!!.</div>');
            redirect('Auth');
        }
    }



    public function logout()
    {
        // sess_destroy digunakan untuk menghancurkan session yg sudah masuk
        $this->session->sess_destroy();
        redirect('Auth/login');
    }
}
