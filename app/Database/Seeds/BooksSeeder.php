<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BooksSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'title' => 'buku apa aja',
        'cover' => 'favicon.ico',
        'publisher' => 'thirdparty',
        'author' => 'mangadex',
        'quantity' => 20,
      ],
      [
        'title' => 'buku apa aja1',
        'cover' => 'favicon.ico',
        'publisher' => 'thirdparty',
        'author' => 'mangadex',
        'quantity' => 20,
      ],
      [
        'title' => 'buku apa aja2',
        'cover' => 'favicon.ico',
        'publisher' => 'thirdparty2',
        'author' => 'mangadex',
        'quantity' => 20,
      ],
    ];

    $this->db->table('books')->insertBatch($data);
  }
}
