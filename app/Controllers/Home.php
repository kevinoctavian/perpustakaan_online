<?php

namespace App\Controllers;

use App\Models\BooksModel;

class Home extends BaseController
{
  public function index(): string
  {
    $books = new BooksModel();

    $data = [
      'books' => $books->paginate(20, 'default', 2),
    ];

    return view('home', $data);
  }
}
