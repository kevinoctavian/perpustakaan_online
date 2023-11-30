<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Pages extends Controller
{
    public function buku()
    {
        // Mendapatkan daftar buku dari model
        $model = new BukuModel();
        $data['buku'] = $model->getBuku();

        // meminta Tampilkan tampilan untuk menampilkan daftar buku
        return view('buku/index', $data);
    }

    public function tambahBuku()
    {
        // meminta Tampilkan tampilan untuk menambah buku
        return view('buku/tambah');
    }

    public function simpanBuku()
    {
        // Tangani penyimpanan buku ke database dari formulir
        $model = new BukuModel();
        $model->save([
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'jumlah_stok' => $this->request->getPost('jumlah_stok'),
        ]);

        // Redirect kembali ke halaman buku setelah penyimpanan
        return redirect()->to('/pages/buku');
    }

    public function editBuku($id)
    {
        // Mendapatkan informasi buku berdasarkan ID dari model
        $model = new BukuModel();
        $data['buku'] = $model->getBuku($id);

        // Tampilkan tampilan untuk mengedit buku
        return view('buku/edit', $data);
    }

    public function updateBuku($id)
    {
        // ini untuk menangani pembaruan informasi buku ke database dari formulir
        $model = new BukuModel();
        $model->update($id, [
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'jumlah_stok' => $this->request->getPost('jumlah_stok'),
        ]);

        // Redirect kembali ke halaman buku setelah pembaruan
        return redirect()->to('/pages/buku');
    }

    public function hapusBuku($id)
    {
        // Tangani penghapusan buku dari database
        $model = new BukuModel();
        $model->delete($id);

        // Redirect kembali ke halaman buku setelah penghapusan
        return redirect()->to('/pages/buku');
    }
}
