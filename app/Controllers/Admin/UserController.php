<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
  public function index()
  {
    $provider = auth()->getProvider();

    $data = [
      'username' => auth()->user()->username,
      'all_users' => []
    ];

    foreach ($provider->findAll() as $key => $value) {
      $user = $value->toArray();

      $user['current_user'] = $user['id'] == auth()->user()->id;
      $data['all_users'][$key] = $user;
    }

    return view('admin/admin_users', $data);
  }
}
