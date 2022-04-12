<div class="mt-5">
    <?php $this->load->view('template/navbar'); ?>
    
</div>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card mb-5" style="max-width: 540px;">
            <div class="d-flex">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url() . 'assets/user_profile/' . $this->session->userdata('img'); ?>" alt="<?= $this->session->userdata('nama'); ?> Profile's Image" class="card-img ms-3">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama : <?= $this->session->userdata('nama'); ?></li>
                            <li class="list-group-item">Email : <?= $this->session->userdata('email'); ?></li>
                            <li class="list-group-item">Id : <?= $this->session->userdata('uid'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 mt-3 ms-auto me-5">
            <a class="btn btn-primary" role="button" href="<?= base_url() . 'auth/logout' ?>">Log Out</a>
        </div>
    </div>
</div>