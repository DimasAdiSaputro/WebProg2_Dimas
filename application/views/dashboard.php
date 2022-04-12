<div class="mt-5">
    <?php $this->load->view('template/navbar'); ?>
</div>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-8 mt-5">
            <?php if ($this->session->flashdata('msg_success')) { ?>
                <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
                    <?= $this->session->flashdata('msg_success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('msg_error')) { ?>
                <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                    <?= $this->session->flashdata('msg_error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="justify-content-center mt-3">
                <?php if(count($booked_list) > 0) { ?>
                    <h2 class="text-center mb-3">Buku Dipinjam</h2>
                    <?php foreach($booked_list as $key=>$row): ?>
                    <div class="d-flex justify-content-center">
                        <div class="card mb-5 mt-3" style="width: 100%;">
                            <div class="d-flex">
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <img src="<?= $row->image ?>" alt="<?= $row->judul_buku ?>'s Cover Book" class="card-img ms-3">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Judul        : <?= $row->judul_buku ?></li>
                                            <li class="list-group-item">Pengarang    : <?= $row->pengarang ?></li>
                                            <li class="list-group-item">Penerbit     : <?= $row->penerbit ?></li>
                                            <li class="list-group-item">Tahun Terbit : <?= $row->tahun_terbit ?></li>
                                            <li class="list-group-item">ISBN         : <?= $row->isbn ?></li>
                                            <li class="list-group-item">Stok         : <?= $row->stok ?></li>
                                            <li class="list-group-item">Kategori     : <?= $row->kategori ?></li>
                                        </ul>
                                        <hr>
                                        <div class="d-flex justify-content-end mt-2">
                                            <div class="col-2 me-3">
                                                <form action="<?= base_url() . 'buku/pinjam' ?>" method="post">
                                                    <input type="hidden" name="book_target_id" value="<?= $row->id_buku ?>">
                                                    <!-- Button trigger modal -->
                                                </form>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_<?= $row->id_booked ?>">
                                                Kembalikan
                                                </button>
                                                <div class="modal fade" id="modal_<?= $row->id_booked ?>" tabindex="-1" aria-labelledby="modal_<?= $row->id_booked ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                Kembalikan buku <strong><?= $row->judul_buku ?></strong>
                                                                <br>
                                                                Denda yang harus kamu bayar : Rp <?= number_format(floor((($row->expiry - time()) / (3600 * -24) + 1 )) * 15000,2,',','.') ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <form action="<?= base_url() . 'buku/kembalikan' ?>" method="post">
                                                                    <input type="hidden" name="booked_id" value="<?= $row->id_pesan ?>">
                                                                    <input type="hidden" name="book_id" value="<?= $row->id_buku ?>">
                                                                    <button type="submit" class="btn btn-primary">Kembalikan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>