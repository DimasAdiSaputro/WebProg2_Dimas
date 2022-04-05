<?php

class Latihan1 extends CI_Controller {
    // controller
    public function index()
    {
        echo "<h1>Selamat datang, selamat belajar web programming</h1>";
    }
    

    public function penjumlahan($n1, $n2)
    {
        $this->load->model('Model_latihan1');
        $data['nilai1'] = $n1;
        $data['nilai2'] = $n2;
        $hasil = $this->Model_latihan1->jumlah($n1, $n2);
        echo "Hasil Penjumlahan dari". $n1 ." + ". $n2 ." = ". $hasil;

        $this->load->view('view-latihan1', $data);
    }
}