<div class="container">
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-3">Login</h2>
                    <?php if ($this->session->flashdata('msg_success')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('msg_success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('msg_error')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('msg_error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <form action="<?= base_url() . 'auth' ?>" class="mb-3" method="post">
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label d-none" for="email">Email :</label>
                            <input type="email" name="email" value="<?= set_value('email') ?>" id="email" class="form-control" placeholder="Masukan Email..">
                            <?= form_error('email', '<div class="text-danger fs-6">', '</div>'); ?>
                        </div>

                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label d-none" for="pass">Password :</label>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Masukan Password..">
                            <?= form_error('pass', '<div class="text-danger fs-6">', '</div>'); ?>
                        </div>

                        <div class="mb-3 d-flex">
                            <button type="submit" class="btn-md btn btn-primary ms-auto fw-bold text-uppercase" style="width: 30%; letter-spacing: 1.6px">Login</button>
                        </div>
                    </form>

                    <a href="<?= base_url() . 'auth/register' ?>" class="text-center">No have account? Register.</a>
                </div>
            </div>
        </div>
    </div>
</div>