<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserAuth extends BaseController
{
  protected $helpers = ['form'];

  public function registerPage()
  {
    $request = request();
    
    if ($request->is('get')) return view('register_page');

    $username = $request->getPost('username');
    $fullname =  $request->getPost('fullname');
    $phonenumber =  $request->getVar('phonenumber');
    $password = $request->getVar('password');
    // $passwordconfirm = $request->getVar('passwordconfirm');
    $gender = $request->getVar('gender');

    $validation = \Config\Services::validation();

    $rules = [
      'username' => 'required|max_length[255]',
      'phonenumber' => 'required|max_length[15]',
      'password' => 'required|max_length[255]|min_length[8]',
      'passwordconfirm' => 'required|matches[password]',
      'gender' => 'required',
    ];
    $validation->setRules($rules);

    // dd($gender);

    if ($validation->withRequest($request)->run()) {
      $userModel = $this->hasUser($username);

      if ($userModel) {
        session()->setFlashdata('error', 'Username ' . $username . ' sudah dipakai orang lain');
      } else {
        $model = new UsersModel();

        $hasPhoneNumber = $model->where(['phone_number' => $phonenumber])->first();

        if ($hasPhoneNumber && $phonenumber == $hasPhoneNumber['phone_number']) {
          session()->setFlashdata('error', 'nomor telpon sudah dipakai orang lain');
        } else {


          $user_id = $model->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'fullname' => $fullname,
            'gender' => $gender,
            'phone_number' => $phonenumber,
            'role' => 0,
          ]);

          session()->set([
            'user_id' => $user_id,
            'logged_in' => true,
          ]);

          return redirect()->to(base_url());
        }
      }
    } else {
      session()->setFlashdata('error', 'Data yang diinputkan tidak valid');
      dd($validation->listErrors());
    }

    session()->setFlashdata('current_input', [
      'username' => $username,
      'fullname' => $fullname,
      'gender' => $gender,
      'phone_number' => $phonenumber,
    ]);
    return redirect()->to(base_url('register'));
  }

  public function loginPage()
  {
    $request = request();
    if ($request->is('get')) return view('login_page');

    $username = $request->getPost('username');
    $password = $request->getVar('password');

    $validation = \Config\Services::validation();

    $rules = [
      'username' => 'required|max_length[255]',
      'password' => 'required|max_length[255]|min_length[8]',
    ];

    $validation->setRules($rules);

    if ($validation->withRequest($request)->run()) {
      $userModel = $this->hasUser($username);

      if ($userModel && password_verify($password, $userModel['password'])) {
        session()->set([
          'user_id' => $userModel['user_id'],
          'logged_in' => true,
        ]);
        return redirect()->to(base_url());
      } else {
        session()->setFlashdata('error', 'Username dan password salah');
      }
    } else {
      session()->setFlashdata('error', 'Data yang diinputkan tidak valid');
      // dd($validation->getValidated());
    }

    session()->setFlashdata('current_input', [
      'username' => $username
    ]);
    return redirect()->to(base_url('login'));
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
