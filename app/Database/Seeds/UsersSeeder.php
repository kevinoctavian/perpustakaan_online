<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'username'      => 'kevinoctavian',
        'email'         => 'kebimbangan12@gmail.com',
        'password'      => password_hash('hello world', PASSWORD_DEFAULT),
        'fullname'      => 'Kevin Octavian',
        'address'       => 'jl bumi',
        'gender'        => 'L',
        'phone_number'  => '081112222333',
        'is_admin'      => true,
      ],
      [
        'username'      => 'amang toyip',
        'email'         => 'kampang',
        'password'      => password_hash('hello world', PASSWORD_DEFAULT),
        'fullname'      => 'Kevin Octavian',
        'address'       => 'jl bumi',
        'gender'        => 'L',
        'phone_number'  => '081112222333',
        'is_admin'      => false,
      ],

    ];

    $this->db->table('users')->insertBatch($data);
  }
}
