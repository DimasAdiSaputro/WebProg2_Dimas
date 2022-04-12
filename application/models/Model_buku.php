<?php
class Model_buku extends CI_Model {

    public function add() {
        $judul = $this->input->post('judul_buku');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $isbn = $this->input->post('isbn');
        $stok = $this->input->post('stok');
        $id_kategori = $this->input->post('id_kategori');

        $data = [
            'judul_buku' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'isbn' => $isbn,
            'stok' => $stok,
            'id_kategori' => $id_kategori,
            'image' => $this->input->post('cover_book_base64')
        ];
        $same_isbn = count($this->db->query('SELECT * from buku WHERE isbn="' . $isbn . '";')->result());
        
        if($same_isbn < 1) {
            $this->db->insert('buku', $data);
            $this->session->set_flashdata('msg_success', 'Buku berhasil ditambahkan!');
            redirect(base_url() . 'buku');
        } else {
            $this->session->set_flashdata('msg_error', 'Buku gagal ditambahkan, ISBN telah terdaftar!');
            redirect(base_url() . 'buku/add');
        }

    }

    public function edit()
    {
        $id = $this->input->post('book_id');
        $judul = $this->input->post('judul_buku');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $isbn = $this->input->post('isbn');
        $stok = $this->input->post('stok');
        $id_kategori = $this->input->post('id_kategori');

        $data = [
            'judul_buku' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'isbn' => $isbn,
            'stok' => $stok,
            'id_kategori' => $id_kategori,
            'image' => $this->input->post('cover_book_base64')
        ];

        if(count($this->db->query('SELECT * from buku WHERE buku.id="' . $id . '";')->result()) > 0) {
            $this->db->where('id', $id);
            $this->db->update('buku', $data);
            $this->session->set_flashdata('msg_success', 'Data Buku berhasil diubah!');
            redirect(base_url() . 'buku');
        }
    }
    
    public function delete()
    {
        $book_id = $this->input->post('book_id');
        $query = 'DELETE FROM buku WHERE buku.id="' . $book_id . '"';

        $this->db->query($query);

        $this->session->set_flashdata('msg_success', 'Buku berhasil dihapus!');
        redirect(base_url() . 'buku');
    }

    public function search($keyword)
    {
        $query = 'SELECT *, buku.id as id_buku from buku 
        INNER JOIN kategori_buku 
        ON kategori_buku.id=buku.id_kategori 
        WHERE 
        buku.judul_buku LIKE "%' . $keyword . '%" 
        OR buku.pengarang LIKE "%' . $keyword . '%" 
        OR buku.penerbit LIKE "%' . $keyword . '%" 
        OR buku.tahun_terbit LIKE "%' . $keyword . '%"
        OR buku.isbn LIKE "%' . $keyword . '%"
        OR kategori_buku.kategori LIKE "%' . $keyword . '%";';

        $data = $this->db->query($query);
        return $data->result();
    }

    public function get_by_id($id)
    {
        $data = $this->db->query('SELECT * from buku WHERE buku.id="' . $id . '";');
        return $data->result()[0];
    }

    public function default_show()
    {
        $data = $this->db->query('SELECT *, buku.id as id_buku from buku INNER JOIN kategori_buku ON buku.id_kategori=kategori_buku.id;');
        return $data->result();
    }

    public function booking()
    {
        $uid = $this->session->userdata('uid');
        $book_id = $this->input->post('book_target_id');
        $id_pesanan = uniqid('pustaka_pinjam_') . microtime(true);
        $day = (3600 * 24) + time();

        $data = [
            'uid' => $uid,
            'id_pesan' => $id_pesanan,
            'id_buku' => $book_id,
            'expiry' => $day
        ];

        $book_data = $this->db->query('SELECT * from buku WHERE id="' . $book_id . '"')->result()[0];
        $this->db->update('buku', ['stok' => $book_data->stok - 1], ['id' => $book_id]);
        
        $this->db->insert('booked', $data);
    }
    
    public function booked()
    {
        $uid = $this->session->userdata('uid');
        $query = 'SELECT *, booked.id as id_booked from booked INNER JOIN buku ON booked.id_buku=buku.id INNER JOIN kategori_buku ON buku.id_kategori=kategori_buku.id WHERE booked.uid="' . $uid . '"';
        
        return $this->db->query($query)->result();
    }
    
    public function kembalikan()
    {
        $id_pesanan = $this->input->post('booked_id');
        $book_id = $this->input->post('book_id');
        
        $book_data = $this->db->query('SELECT * from buku WHERE id="' . $book_id . '"')->result()[0];
        $this->db->update('buku', ['stok' => $book_data->stok + 1], ['id' => $book_id]);

        $this->db->delete('booked', ['id_pesan' => $id_pesanan]);
    }

}