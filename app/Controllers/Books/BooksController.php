<?php

namespace App\Controllers\Books;

use App\Controllers\BaseController;
use App\Models\BooksModel;

class BooksController extends BaseController
{
  public function index()
  {
    $books = new BooksModel();

    $data = [
      'books' => $books->findAll(12),
    ];

    return view('books/books', $data);
  }
}
