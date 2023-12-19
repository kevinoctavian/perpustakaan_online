<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use CodeIgniter\Database\ResultInterface;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Exceptions\ValidationException;

class Users extends ResourceController
{
  use ResponseTrait;

  private UserModel $users;

  public function __construct()
  {
    $this->users = auth()->getProvider();
  }

  public function index()
  {

    $data = [
      'username' => auth()->user()->username,
      'all_users' => []
    ];

    foreach ($this->users->findAll() as $key => $value) {
      $user = $value->toArray();

      $user['current_user'] = $user['id'] == auth()->user()->id;
      $data['all_users'][$key] = $user;
    }

    return view('admin/admin_users', $data);
  }

  public function show($id = null)
  {
    $data = $this->getUserWithId($id)
      ->getResult();

    if ($data) {
      return $this->respond($data);
    } else {
      return redirect()->to(base_url('admin/users'))->with('message', 'User not found with id ' . $id);
    }
  }

  public function create()
  {
    // $groups = $this->request->getPost('group');

    $allowedPostFields = [
      'email', 'username',
      'fullname', 'phone_number',
      'password', 'gender'
    ];
    $user = new User();
    $user->fill($this->request->getPost($allowedPostFields));

    try {
      $this->users->save($user);
    } catch (ValidationException $th) {
      return redirect()->back()->withInput()->with('errors', $this->users->errors());
    }

    $user = $this->users->findById($this->users->getInsertID());

    $this->users->addToDefaultGroup($user);

    return redirect()->to(base_url('admin/users'))->with('message', 'creating user successfully');
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

    $this->users->update($id, $data);
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

    $this->users->delete($id, true);

    $res = [
      'status' => 200,
      'message' => null,
      'messages' => [
        'success' => 'success delete'
      ]
    ];

    return $this->respond($res);
  }

  private function getUserWithId($id): ResultInterface
  {
    return $this->users
      ->builder()
      ->where('id', $id)
      ->get(1);
  }
}
