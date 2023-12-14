<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BooksController extends BaseController
{
  public function index()
  {
    return view('books');
  }
}
