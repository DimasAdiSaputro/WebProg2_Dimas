<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">>Daftar Menjadi Member!</h1>
                                    </div>
                                    <?= $this->session->flashdata("pesan");?>
                                    <form class="user" method="post" action="<?= base_url('autentifikasi/registrasi'); ?> ">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nama" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama');?>">
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" placeholder="Masukan Email" name="email" value="<?= set_value('email');?>">
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                        <button class="btn btn-primary btn-user btn-block" name="submit" type="submit">
                                            DAFTAR MENJADI MEMBER
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url();?>autentifikasi/lupapassword">Lupa Password</a>
                                    </div>
                                    <div class="text-center">
                                        SUDAH MENJADI MEMBER
                                        <a class="small" href="<?=base_url();?>autentifikasi">Buat Akun Baru!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>