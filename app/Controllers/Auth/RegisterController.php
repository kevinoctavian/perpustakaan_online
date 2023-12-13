<?php

namespace App\Controllers\Auth;

// use App\Controllers\BaseController;
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Events\Events;
use Config\Auth;

class RegisterController extends ShieldRegister
{
  private Auth $auth;

  public function __construct()
  {
    $this->auth = config('Auth');
  }

  public function postRegister()
  {
    if (auth()->loggedIn()) {
      return redirect()->to($this->auth->registerRedirect());
    }

    // Check if registration is allowed
    if (!setting('Auth.allowRegistration')) {
      return redirect()->back()->withInput()
        ->with('error', lang('Auth.registerDisabled'));
    }

    $users = $this->getUserProvider();

    // Validate here first, since some things,
    // like the password, can only be validated properly here.
    $rules = $this->getValidationRules();

    if (!$this->validateData($this->request->getPost(), $rules, [], $this->auth->DBGroup)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Save the user
    $allowedPostFields = array_keys($rules);
    $user              = $this->getUserEntity();
    $user->fill($this->request->getPost($allowedPostFields));

    try {
      // dd($users, $user, $this->request->getPost(), $rules, $allowedPostFields);
      $users->save($user);
    } catch (ValidationException $e) {
      return redirect()->back()->withInput()->with('errors', $users->errors());
    }

    // To get the complete user object with ID, we need to get from the database
    $user = $users->findById($users->getInsertID());

    // Add to default group
    $users->addToDefaultGroup($user);

    Events::trigger('register', $user);

    /** @var Session $authenticator */
    $authenticator = auth('session')->getAuthenticator();

    $authenticator->startLogin($user);

    // If an action has been defined for register, start it up.
    $hasAction = $authenticator->startUpAction('register', $user);
    if ($hasAction) {
      return redirect()->route('auth-action-show');
    }

    // Set the user active
    $user->activate();

    $authenticator->completeLogin($user);

    // Success!
    return redirect()->to($this->auth->registerRedirect())
      ->with('message', lang('Auth.registerSuccess'));
  }
}
