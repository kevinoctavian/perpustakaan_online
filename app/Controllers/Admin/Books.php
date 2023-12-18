<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\BooksModel;
use CodeIgniter\Database\ResultInterface;

class Books extends ResourceController
{
  use ResponseTrait;

  private BooksModel $books;

  public function __construct()
  {
    $this->books = new BooksModel();
  }

  public function index()
  {
    $books = new BooksModel();

    $data = [
      'books' => $books->findAll(20),
    ];

    return view('admin/admin_books', $data);
  }

  public function show($id = null)
  {
    $data = $this->getBookWithId($id)
      ->getResult();

    if ($data) {
      return $this->respond($data);
    } else {
      return redirect()->to(base_url('admin/users'))->with('message', 'User not found with id ' . $id);
    }
  }

  public function create()
  {
  }

  public function update($id = null)
  {
    $json = $this->request->getJSON();

    if ($json) {
      foreach ($json as $key => $value) {
        $data[$key] = $value;
      }
    } else {
      $input = $this->request->getRawInput();
      // return $this->respond();
      foreach ($input as $key => $value) {
        $data[$key] = $value;
      }
    }

    $this->books->update($id, $data);
    $res = [
      'status' => 200,
      'message' => null,
      'messages' => [
        'success' => 'User updated'
      ]
    ];

    return $this->respond($res);
  }

  public function delete($id = null)
  {
    $permanent = boolval($this->request->getGet('perma'));

    $book = $this->getBookWithId($id)->getResult();

    if ($book) {
      $this->books->delete($id, $permanent);
    } else {
      return redirect()->to(base_url('admin/books'))->with('message', 'book not found with id ' . $id);
    }

    $res = [
      'status' => 204,
      'message' => null,
      'messages' => [
        'success' => 'Success Delete Book'
      ]
    ];

    return $this->respond($res);
  }

  private function getBookWithId($id): ResultInterface
  {
    return $this->books
      ->builder()
      ->where('id', $id)
      ->get(1);
  }
}
