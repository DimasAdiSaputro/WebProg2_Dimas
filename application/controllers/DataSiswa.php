<?php
class DataSiswa extends CI_Controller
{
  public function index()
  {
    $this->load->view('view_form_datasiswa');
  }
  public function cetak()
  {
    $this->form_validation->set_rules(
      'nama',
      'required|min_length[20]',
      [
        'required' => 'Nama Harus diisi',
        'min_lenght' => 'Nama terlalu pendek'
      ]
    );

    $this->form_validation->set_rules(
        'nis',
        'required|min_length[5]',
      [
        'required' => 'nis Harus diisi',
        'min_lenght' => 'nis terlalu pendek'
      ]
    );

    $this->form_validation->set_rules(
        'kelas',
        'required|min_length[10]',
      [
        'required' => 'kelas Harus diisi',
        'min_lenght' => 'kelas terlalu pendek'
      ]
    );

    if ($this->form_validation->run() != true) {
      $this->load->view('view_form_datasiswa');
    } else {
      $data = [
        'nama' => $this->input->post('nama'),
        'nis' => $this->input->post('nis'),
        'kelas' => $this->input->post('kelas'),
        'alamat' => $this->input->post('alamat'),
        'jeniskel' => $this->input->post('jeniskel'),
        'ttl' => $this->input->post('ttl'),
        'agama' => $this->input->post('agama'),
      ];
      $this->load->view('view_tampil_datasiswa', $data);
    }
  }
}