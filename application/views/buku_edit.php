<div class="mt-5">
    <?php $this->load->view('template/navbar'); ?>
</div>
<?php  if($this->session->userdata('role') == 1) {?>
<div class="container mt-5 pb-5">
	<div class="d-flex justify-content-center">
		<div class="col-md-8">
			<h2 class="modal-title text-center" id="addBukuLabel">Edit Buku</h2>
			<form action="<?= base_url() . 'buku/edit' ?>" method="post">
            <div class="mb-2">
					<label for="judul_buku" class="form-label"></label>
					<input type="text" name="judul_buku" value="<?= $book->judul_buku ?>" id="judul_buku" class="form-control" placeholder="Judul Buku">
					<?= form_error('judul_buku', '<div class="text-danger fs-6 mt-2">', '</div>'); ?>
				</div>
				<div class="mb-2">
					<label for="pengarang" class="form-label"></label>
					<input type="text" name="pengarang" value="<?= $book->pengarang ?>" id="pengarang" class="form-control" placeholder="Pengarang">
					<?= form_error('pengarang', '<div class="text-danger fs-6 mt-2">', '</div>'); ?>
				</div>
				<div class="mb-2">
					<label for="penerbit" class="form-label"></label>
					<input type="text" name="penerbit" value="<?= $book->penerbit ?>" id="penerbit" class="form-control" placeholder="Penerbit">
					<?= form_error('penerbit', '<div class="text-danger fs-6 mt-2">', '</div>'); ?>
				</div>
				<div class="mb-2">
					<label for="tahun_terbit" class="form-label"></label>
					<input type="text" name="tahun_terbit" value="<?= $book->tahun_terbit ?>" id="tahun_terbit" class="form-control"
						placeholder="Tahun Terbit">
					<?= form_error('tahun_terbit', '<div class="text-danger fs-6 mt-2">', '</div>'); ?>
				</div>
				<div class="mb-2">
					<label for="isbn" class="form-label"></label>
					<input type="text" name="isbn" value="<?= $book->isbn ?>" id="isbn" class="form-control" placeholder="ISBN">
					<?= form_error('isbn', '<div class="text-danger fs-6 mt-2">', '</div>'); ?>
				</div>
				<div class="mb-2">
					<label for="stok" class="form-label"></label>
					<input type="text" name="stok" value="<?= $book->stok ?>" id="stok" class="form-control" placeholder="Stok">
					<?= form_error('stok', '<div class="text-danger fs-6 mt-2">', '</div>'); ?>
				</div>
				<div class="mb-2">
					<label for="id_kategori" class="form-label"></label>
					<input type="text" name="id_kategori" value="<?= $book->id_kategori ?>" id="id_kategori" class="form-control"
						placeholder="ID Kategori">
					<?= form_error('id_kategori', '<div class="text-danger fs-6 mt-2">', '</div>'); ?>
				</div>
                <div class="mb-3">
					<label for="formFile" class="form-label">Cover book</label>
					<input class="form-control" type="file" id="cover_book" name="cover_book">
				</div>
				<input type="hidden" name="cover_book_base64" id="cover_book_base64" value="<?= $book->image ?>">
                <input type="hidden" name="book_id" value="<?= $book->id ?>">
				<button type="submit" class="ms-auto btn mt-3 btn-primary">Tambahkan</button>
			</form>
            <script>
				const reader = new FileReader();
				document.querySelector('#cover_book').addEventListener('change', function(el) {
					reader.readAsDataURL(el.target.files[0]);
				})
				reader.onload = function () {
					document.querySelector('#cover_book_base64').value = reader.result;
				};
			</script>
		</div>
	</div>
</div>
<?php } else {
	redirect(base_url() . 'buku');
} ?>
