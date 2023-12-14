<?php

namespace App\Controllers\Books;

use App\Controllers\BaseController;

class BooksController extends BaseController
{
  public function index()
  {
    return view('books');
  }
}
