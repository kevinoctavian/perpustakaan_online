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
        'type' => 'VARCHAR',
        'constraint' => 15,
        'null' => true,
        'unique' => true,
      ],
      'created_at' => [
        'type' => 'datetime',
      ],
      'updated_at' => [
        'type' => 'datetime',
        'null' => true,
      ],
      'deleted_at' => [
        'type' => 'datetime',
        'null' => true,
      ],
      'role' => [
        'type' => 'enum',
        'constraint' => ['0', '1', '2'], // 0 = user, 1 = moderator, 2 = administrator
        'default' => '0',
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
