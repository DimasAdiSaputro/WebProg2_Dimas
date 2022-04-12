<div class="container">
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-3">Register</h2>
                    <form action="<?= base_url() . 'auth/register' ?>" class="mb-3" method="post">
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label d-none" for="nama">Email :</label>
                            <input type="text" name="nama" value="<?= set_value('nama') ?>" id="nama" class="form-control" placeholder="Masukan Nama..">
                            <?= form_error('nama', '<div class="text-danger fs-6">', '</div>'); ?>
                        </div>
            
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label d-none" for="email">Email :</label>
                            <input type="email" name="email" value="<?= set_value('email') ?>" id="email" class="form-control" placeholder="Masukan Email..">
                            <?= form_error('email', '<div class="text-danger fs-6">', '</div>'); ?>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <label class="col-sm-2 col-form-label d-none" for="pass1">Password :</label>
                                <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Masukan Password..">
                                <?= form_error('pass1', '<div class="text-danger fs-6">', '</div>'); ?>
                            </div>

                            <div class="col">
                                <label class="col-sm-2 col-form-label d-none" for="pass2">Repeat Password :</label>
                                <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Ulangi Password..">
                                <?= form_error('pass2', '<div class="text-danger fs-6">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <button type="submit" class="btn-md btn btn-primary ms-auto fw-bold text-uppercase" style="width: 30%; letter-spacing: 1.6px">Register</button>
                        </div>
                    </form>

                    <a href="<?= base_url() . 'auth' ?>" class="text-center">Have account? Login.</a>
                </div>
            </div>
        </div>
    </div>
</div>