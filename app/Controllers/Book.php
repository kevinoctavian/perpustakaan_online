<?php

namespace App\Controllers;

use App\Models\BooksModel;
use CodeIgniter\Controller;

class Book extends Controller
{
    public function buku()
    {
        // Mendapatkan daftar buku dari model yang ditambahakan
        // $model = new BooksModel();

        // meminta Tampilkan,tampilan untuk menampilkan daftar buku
        return view('buku_page');
    }

    public function tambahBuku()
    {
        // meminta Tampilkan tampilan untuk menambah buku  
        $model = new BooksModel();


        return view('buku/tambah');
    }

    public function simpanBuku()
    {
        // Tangani penyimpanan buku ke database dari formulir
        $model = new BooksModel();
        // $model->save([
        //     'judul' => $this->request->getPost('judul'),
        //     'pengarang' => $this->request->getPost('pengarang'),
        //     'penerbit' => $this->request->getPost('penerbit'),
        //     'jumlah_stok' => $this->request->getPost('jumlah_stok'),
        // ]);

        // Redirect (tindakan) kembali ke halaman buku setelah melakukan penyimpanan
        return redirect()->to('/pages/buku');
    }

    public function editBuku($id)
    {
        // Mendapatkan informasi buku berdasarkan ID dari model buku
        $model = new BooksModel();
        $data['buku'] = $model->getBuku($id);

        // Tampilkan tampilan untuk mengedit buku
        return view('buku/edit', $data);
    }

    public function updateBuku($id)
    {
        // ini untuk menangani pembaruan informasi buku ke database dari formulir
        $model = new BooksModel();
        // $model->update($id, [
        //     'judul' => $this->request->getPost('judul'),
        //     'pengarang' => $this->request->getPost('pengarang'),
        //     'penerbit' => $this->request->getPost('penerbit'),
        //     'jumlah_stok' => $this->request->getPost('jumlah_stok'),
        // ]);

        // Redirect kembali ke halaman buku setelah terjadi pembaruan
        return redirect()->to('/pages/buku');
    }

    public function hapusBuku($id)
    {
        // Tangani penghapusan buku dari database
        $model = new BooksModel();
        $model->delete($id);

        // Redirect kembali ke halaman buku setelah penghapusan
        return redirect()->to('/pages/buku');
    }
}
