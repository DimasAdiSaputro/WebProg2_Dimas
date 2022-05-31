<?php 

class Autentifikasi extends CI_Controller
{
    
    public function index()
    {
        $this->form_validation->set_rules('email', 'alamat email', 'required|trim|valid_email',[
            'required' => "email harus diisi",
            'valid_email' => "Email tidak benar!"
        ]);

        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]',[
            'required' => "password harus diisi",
            'min_length' => "password minimal berisi 3 karakter"
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';

            $this->load->view('template/aute_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('template/aute_footer');
        } else{
            $this->_login();
        }
    }

    private function _login(){
        $email = htmlspecialchars($this->input->post('email', TRUE));
        $password = $this->input->post('password', TRUE);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //jika usernya ada
        if($user){

            //jika usernya sudah aktif
            if($user['is_active'] == 1){
                //cek password
                $md5pass = md5($password); //password yang sudah dibuat
                if($md5pass == $user['password']){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    
                    if($user['role_id'] == 1){
                        redirect('admin');
                    }else{
                        if($user['image'] == 'default.jpg'){
                            $this->session->flashdata('pesan', '
                            <div class="allert alert-info alert-messsage" role="alert">Silahkan Ubah Profile anda untuk ubah poto profil</div>');
                        }
                        redirect('user');

                    }
                }else{
                    $this->session->flashdata('pesan', '
                    <div class="allert alert-info alert-messsage" role="alert">Password Salah</div>');
                    redirect('autentifikasi');
                }

            }else{
                $this->session->flashdata('pesan', '
                <div class="allert alert-info alert-messsage" role="alert">user tidak aktif</div>');
                redirect('autentifikasi');
            }
        }else{
            $this->session->flashdata('pesan', '
            <div class="allert alert-info alert-messsage" role="alert">email tidak terdaftar</div>');
            redirect('autentifikasi');
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[50]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('pass1', 'Password 1', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('pass2', 'Password 2', 'required|min_length[3]|max_length[50]|matches[pass1]');

        $this->form_validation->set_message('valid_email', 'Email yang anda masukan tidak valid!');
        $this->form_validation->set_message('required', 'Kolom ini wajib di-isi!');
        $this->form_validation->set_message('matches', 'Password tidak sesuai!');
        $this->form_validation->set_message('min_length', 'Kolom harus di-isi minimal 3 karakter!');
        $this->form_validation->set_message('max_length', 'Kolom harus di-isi maksimal 50 karakter!');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Register Page';
            $data['user'] = '';

            $this->load->view('template/aute_header', $data);
            $this->load->view('autentifikasi/registrasi');
            $this->load->view('template/aute_footer');
        } else {
            $this->load->model('ModelUser');
            $this->ModelUser->CekData();
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->flashdata('pesan', '
        <div class="allert alert-info alert-messsage" role="alert">anda telah logout</div>');
        redirect('autentifikasi');
    }

    public function blok(){
        $this->load->view('autentifikasi/blok');
    }

    public function gagal(){
        $this->load->view('autentifikasi/gagal');
    }

    
}