<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'user_id' => [
        'type' => 'INT',
        'unsigned' => true,
        'auto_increment' => true,
      ],
      'username' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => false
      ],
      'fullname' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => false
      ],
      'address' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => false
      ],
      'gender' => [
        'type' => 'CHAR',
        'constraint' => 1,
        'null' => false
      ],
      'phone_number' => [
        'type' => 'INT',
        'constraint' => 15,
        'null' => true
      ],
    ]);
    $this->forge->addPrimaryKey('user_id', 'pk_userid');
    $this->forge->createTable('users', true);
  }

  public function down()
  {
    $this->forge->dropTable("users", true);
  }
}
