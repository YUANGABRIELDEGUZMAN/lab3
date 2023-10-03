<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
class Admin extends BaseController
{
  public function login()
  {
      helper(['form']);
      $data = [];
      return view('login');
  }

  public function register()
  {
      helper(['form']);
      $data = [];
      return view('signup');
  }

  public function authreg()
  {
      helper(['form']);
      $rules = [
          'username' => 'required|min_length[1]|max_length[100]',
          'password' => 'required|min_length[1]|max_length[50]',
          'confirmpassword' => 'matches[password]'
      ];

      if ($this->validate($rules)) {
          $userModel = new UserModel();
          $data = [
              'username' => $this->request->getVar('username'),
              'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
          ];
          $userModel->save($data);
          return redirect()->to('/login');
      } else {
          $data['validation'] = $this->validator;
          echo view('signup', $data);
      }
  }

  public function logout()
  {
      $session = session();
      $session->destroy(); // Destroy the user's session data
      return redirect()->to('/home'); // Redirect to the login page or any other page you prefer
  }

  public function authlog()
  {
      $session = session();
      $userModel = new UserModel();
      $username = $this->request->getVar('username');
      $password = $this->request->getVar('password');

      $data = $userModel->where('username', $username)->first();
      if ($data) {
          $pass = $data['password'];
          $authenticatePassword = password_verify($password, $pass);
          if ($authenticatePassword) {
              $ses_data = [

                  'id' => $data['id'],
                  'username' => $data['username'],
                  'isLoggedIn' => TRUE
              ];
              $session->set($ses_data);
              return redirect()->to('/admin');

          } else {
              $session->setFlashdata('msg', 'Password is incorrect.');
              return view('login');
          }
      } else {
          $session->setFlashdata('msg', 'Email does not exist.');
          return view('login');
      }
}
}
