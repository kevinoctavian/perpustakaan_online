<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BooksModel;

class BookController extends BaseController
{
  public function index()
  {
    $books = new BooksModel();

    $data = [
      'books' => $books->findAll(20),
    ];

    return view('admin/admin_books', $data);
  }

  public function postBook()
  {
  }
}
