<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BooksModel;
use App\Models\BorrowBookModel;

class AdminController extends BaseController
{
  public function index()
  {
    /** @var BooksModel $books */
    $books = new BooksModel();
    $borrow = new BorrowBookModel();

    $data = [
      'user_count' => auth()->getProvider()->countAllResults(),
      'book_count' => $books->countAllResults(),
      'borrow_count' => $borrow->countAllResults()
    ];


    return view('admin/admin_page', $data);
  }
}
