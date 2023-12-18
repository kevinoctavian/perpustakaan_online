<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BooksSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'title'     => 'Bash and Lucy 2',
        'cover'     => 'img/bash_and_lucy-2.jpg',
        'publisher' => 'ibnu rofik',
        'author'    => 'Perpustakaan Online',
        'quantity'  => random_int(1, 100),
      ],
      [
        'title'     => 'Be Well Bee',
        'cover'     => 'img/be_well_bee.jpg',
        'publisher' => 'Kevin Octavian',
        'author'    => 'Perpustakaan Online',
        'quantity'  => random_int(1, 100),
      ],
      [
        'title'     => 'Boring Girls a Novel',
        'cover'     => 'img/boring_girls_a_novel.jpg',
        'publisher' => 'Ryan Achmad antama',
        'author'    => 'Perpustakaan Online',
        'quantity'  => random_int(1, 100),
      ],
      [
        'title'     => 'Clever Lands',
        'cover'     => 'img/clever_lands.jpg',
        'publisher' => 'Fernando',
        'author'    => 'Perpustakaan Online',
        'quantity'  => random_int(1, 100),
      ],
      [
        'title'     => 'Darknet',
        'cover'     => 'img/darknet.jpg',
        'publisher' => 'Abel',
        'author'    => 'Perpustakaan Online',
        'quantity'  => random_int(1, 100),
      ],
      [
        'title'     => 'Economic',
        'cover'     => 'img/economic.jpg',
        'publisher' => 'Epen ',
        'author'    => 'Perpustakaan Online',
        'quantity'  => random_int(1, 100),
      ],
    ];

    $this->db->table('books')->insertBatch($data);
  }
}
