<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;
    protected $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function register()
    {
        if ($this->request) {
            //get request from Vue Js
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $data = [
                    'name' =>  $json->name,
                    'email'   => $json->email,
                    'password' => password_hash($json->password, PASSWORD_DEFAULT),
                    'address' => $json->alamat,
                    'phone_number' => $json->no_hp,
                    'date_of_birth' => $json->tanggal_lahir,
                    'gender' => $json->gender
                ];
            } else {
                //get request from Postman and more
                $data = [
                    'name'     => $this->request->getPost('nama'),
                    'email'   => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'address' => $this->request->getPost('alamat'),
                    'phone_number' => $this->request->getPost('no_hp'),
                    'date_of_birth' => $this->request->getPost('tanggal_lahir'),
                    'gender' => $this->request->getPost('gender')
                ];
            }
            $this->model->insert($data);
            return $this->respond([
                'code' => 201,
                'message'    => 'Registrasi Berhasil',
            ], 201);
        }
    }

    public function login()
    {
        if ($this->request) {
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                // $session = session();
                $email = $json->email;
                $password = $json->password;
                $user = $this->model->where('email', $email)->first();
                if (password_verify($password, $user['password'])) {
                    return $this->respond([
                        'code' => 201,
                        'message' => 'Login berhasil',
                        'id' => $user['id_customer'],
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'logged_in' => TRUE
                    ], 201);
                    // $user_logged_in = [
                    //     'id' => $user['id'],
                    //     'email' => $user['email'],
                    //     'name' => $user['name'],
                    //     'logged_in' => TRUE
                    // ];
                    // $session->set($user_logged_in);
                    // return redirect()->to('/dashboard');
                } else {
                    return $this->respond([
                        'code' => 400,
                        'message' => 'Login gagal, cek kembali email & password',
                    ], 400);
                }
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $user = $this->model->where('email', $email)->first();
                if (password_verify($password, $user['password'])) {
                    return $this->respond([
                        'code' => 201,
                        'message'    => 'Login berhasil',
                    ], 201);
                } else {
                    return $this->respond([
                        'code' => 400,
                        'message'    => 'Login gagal, cek kembali email & password',
                    ], 400);
                }
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
