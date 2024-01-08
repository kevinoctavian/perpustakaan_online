<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BooksModel;
use App\Models\BorrowBookModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class BorrowBook extends BaseController
{
  public function index()
  {
    $user_id = auth()->user()->id;
    $borrows = new BorrowBookModel();

    $borrow_builder = $borrows->builder();
    $borrow_builder->where('user_id', $user_id);
    $borrow_builder->join('books', 'peminjaman_buku.book_id = books.book_id');

    $data = [
      'borrowed_book' => $borrow_builder->get()->getResult('array'),
    ];

    // dd($data);

    return view('borrow_book', $data);
  }

  public function borrow($book_id)
  {
    if (!auth()->loggedIn()) {
      return redirect()->to(base_url('login'));
    }

    $user_id = auth()->user()->id;
    $borrow = new BorrowBookModel();
    $books = new BooksModel();

    $is_already_borrow = $borrow->where(['user_id' => $user_id, 'book_id' => $book_id])->first();

    if ($is_already_borrow == null) {
      // dd($book_id, $user_id);
      $row = [
        'user_id' => $user_id,
        'book_id' => intval($book_id)
      ];

      $borrow->insert($row);
      $book = $books->find($book_id);
      // dd($book['quantity'], intval($book['quantity']) - 1);
      $books->update($book_id, ['quantity' => intval($book['quantity']) - 1]);

      return redirect()->back()->with('success', 'Berhasil meminjam buku');
    } else {
      if ($is_already_borrow['is_returned'] == '1') {
        $book = $books->find($is_already_borrow['book_id']);
        $books->update($book['book_id'], ['quantity' => intval($book['quantity']) - 1]);

        $borrow->update(
          $is_already_borrow['borrowing_id'],
          ['is_returned' => false, 'returned_date' => null, 'borrowing_date' => Time::now()]
        );
        return redirect()->back()->with('success', 'Berhasil meminjam buku');
      }

      return view('errors/already_borrow', ['return_id' => $is_already_borrow['borrowing_id']]);
    }
  }

  public function returnBook($borrow_id)
  {
    if (!auth()->loggedIn()) {
      return redirect()->to(base_url('login'));
    }

    $user_id = auth()->user()->id;
    $borrows = new BorrowBookModel();
    $books = new BooksModel();

    $borrow = $borrows->find($borrow_id);

    if ($borrow == null) {
      return redirect()->to(base_url());
    }

    if (intval($borrow['user_id']) == $user_id) {
      $book = $books->find($borrow['book_id']);
      $books->update($book['book_id'], ['quantity' => intval($book['quantity']) + 1]);

      $borrows->update($borrow['borrowing_id'], ['is_returned' => true, 'returned_date' => Time::now()]);

      return redirect()->to(base_url());
    }
  }
}
