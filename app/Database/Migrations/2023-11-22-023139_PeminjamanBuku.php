<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeminjamanBuku extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'borrowing_id' => [
        'type' => 'INT',
        'unsigned' => true,
        'auto_increment' => true,
      ],
      'user_id' => [
        'type' => 'INT',
        'unsigned' => true,
      ],
      'book_id' => [
        'type' => 'INT',
        'unsigned' => true,
      ],
      'is_returned' => [
        'type' => 'BOOL',
        'default' => false,
      ],
      'borrowing_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL',
      'returned_date DATETIME'
    ]);

    $this->forge->addPrimaryKey('borrowing_id', 'pk_borrowingid');
    $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE', 'fk_userid');
    $this->forge->addForeignKey('book_id', 'books', 'book_id', 'CASCADE', 'CASCADE', 'fk_bookid');
    $this->forge->createTable('peminjaman_buku', true);
  }

  public function down()
  {
    $this->forge->dropTable('peminjaman_buku', true);
  }
}
