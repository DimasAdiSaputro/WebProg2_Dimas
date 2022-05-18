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

            $this->load->view('templates1/aute_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates1/aute_footer');
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

}