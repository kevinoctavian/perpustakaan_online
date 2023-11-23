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
        'unique' => true,
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
        'unique' => true,
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'fullname' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'address' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'gender' => [
        'type' => 'ENUM',
        'constraint' => ['L', 'P'],
      ],
      'phone_number' => [
        'type' => 'INT',
        'constraint' => 15,
        'null' => true,
        'unique' => true,
      ],
      'is_admin' => [
        'type' => 'bool',
        'default' => false,
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
