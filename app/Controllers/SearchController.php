<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BooksModel;

class SearchController extends BaseController
{
  public function index()
  {
    $search = strval($this->request->getGet('s') ?? '');

    $data = [
      'search_books' => []
    ];

    if ($search) {
      $books = new BooksModel();

      $search_books = $books
        ->builder('books')
        ->like('title', $search)
        ->orLike('publisher', $search)
        ->orLike('author', $search)
        ->get(20)
        ->getResult();
      $data['search_books'] = $search_books;

      session()->setFlashdata('search', $search);
    }

    return view('search_page', $data);
  }
}
