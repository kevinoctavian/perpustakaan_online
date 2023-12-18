<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BooksModel;

class AdminController extends BaseController
{
  public function index()
  {
    /** @var BooksModel $books */
    $books = new BooksModel();

    $data = [
      'user_count' => auth()->getProvider()->countAllResults(),
      'book_count' => $books->countAllResults(),
    ];


    return view('admin/admin_page', $data);
  }
}
