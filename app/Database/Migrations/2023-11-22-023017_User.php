<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
  public function up()
  {
    $this->forge->addColumn('users', [
      'fullname' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'gender' => [
        'type' => 'ENUM',
        'constraint' => ['L', 'P'],
      ],
      'phone_number' => [
        'type' => 'VARCHAR',
        'constraint' => 15,
        'null' => true,
      ],
    ]);

    $this->forge->addUniqueKey('phone_number');
  }

  public function down()
  {
    // $this->forge->dropTable("users", true);
  }
}
