<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihansatu extends CI_Controller {
  // controller
  public function index()
  {
    echo "<h1>Contoh class</h1>";
  }

  // controller dan view
  public function biodata()
  {
    $this->load->view('view_biodata');
  }

  // controller dan model
  public function biodatatiga(){
    $this->load->model('model_biodata'); // panggil model
    $bio = $this->model_biodata->biodata();

    echo "<h1>Perkenalkan</h1>";
    echo "<br>";
    echo "Nama :" . $bio;
  }

  // controller, model dan view
  public function biodataempat(){
    $this->load->model('model_biodata'); // model
    $bio = $this->model_biodata->biodata();

    $data['title'] = "Form Biodata";

    $this->load->view('view_biodata', $data); // view
    
  }

}