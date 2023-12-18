<?php

namespace App\Controllers\Auth;

// use App\Controllers\BaseController;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use Config\Auth;

class LoginController extends ShieldLogin
{
  private Auth $auth;

  public function __construct()
  {
    $this->auth = config('Auth');
  }

  public function postLogin()
  {
    // Validate here first, since some things,
    // like the password, can only be validated properly here.
    $rules = $this->getValidationRules();

    if (!$this->validateData($this->request->getPost(), $rules, [], $this->auth->DBGroup)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    /** @var array $credentials */
    $credentials             = [];

    $username_or_email = filter_var(
      $this->request->getPost('username_or_email'),
      FILTER_VALIDATE_EMAIL
    ) ? 'email' : 'username';
    // dd($username_or_email);
    $credentials[$username_or_email] = $this->request->getPost('username_or_email');
    $credentials['password'] = $this->request->getPost('password');
    $remember                = (bool) $this->request->getPost('remember');

    /** @var Session $authenticator */
    $authenticator = auth('session')->getAuthenticator();
    // dd($credentials);
    // Attempt to login
    $result = $authenticator->remember($remember)->attempt($credentials);
    if (!$result->isOK()) {
      return redirect()->route('login')->withInput()->with('error', $result->reason());
    }

    // If an action has been defined for login, start it up.
    if ($authenticator->hasAction()) {
      return redirect()->route('auth-action-show')->withCookies();
    }

    return redirect()->to($this->auth->loginRedirect())->withCookies();
  }
}
