<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserAuth extends BaseController
{
  public function registerPage()
  {
    $request = request();
    if ($request->is('get')) return view('register');

    $username = $request->getPost('username');
    $email =  $request->getPost('email');
    $phonenumber =  $request->getVar('phonenumber');
    $password = $request->getVar('password');

    $userModel = $this->hasUser($username);

    if ($userModel) {
      session()->setFlashdata('error', 'Username ' . $username . ' sudah dipakai orang lain');
      var_dump('redirect');
      return redirect()->to(base_url('register'));
    } else {
      $model = new UsersModel();
      // dd([$phonenumber, intval($phonenumber)]);
      $user_id = $model->insert([
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'fullname' => $username . ' ' . $email,
        'address' => 'jalan atas bumi',
        'gender' => 'L',
        'phone_number' => $phonenumber,
      ]);

      session()->set([
        'user_id' => $user_id,
        'logged_in' => true,
      ]);

      return redirect()->to(base_url());
    }
  }

  public function loginPage()
  {
    $request = request();

    if ($request->is('get')) return view('login_page');

    $username = $request->getPost('username');
    // $email =  $request->getPost('email');
    $password = $request->getVar('password');

    $userModel = $this->hasUser($username);

    if ($userModel && password_verify($password, $userModel['password'])) {
      session()->set([
        'user_id' => $userModel['user_id'],
        'logged_in' => true,
      ]);
      return redirect()->to(base_url());
    } else {
      session()->setFlashdata('error', 'Username dan password salah');
      var_dump('redirect');
      return redirect()->to(base_url('login'));
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url());
  }

  private function hasUser($username)
  {
    $model = new UsersModel();
    $user = $model->where(['username' => $username]);

    return $user->first();
  }
}
