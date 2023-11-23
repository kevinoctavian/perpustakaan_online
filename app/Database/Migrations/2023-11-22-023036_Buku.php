<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'book_id' => [
        'type' => 'INT',
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'title' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'unique' => true,
      ],
      'cover' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ],
      'publisher' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'default' => 'anonymous',
      ],
      'author' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'default' => 'anonymous',
      ],
      'quantity' => [
        'type' => 'INT',
        'default' => 0,
      ]
    ]);
    $this->forge->addPrimaryKey('book_id', 'pk_bookid');
    $this->forge->createTable('books', true);
  }

  public function down()
  {
    $this->forge->dropTable('books', true);
  }
}
