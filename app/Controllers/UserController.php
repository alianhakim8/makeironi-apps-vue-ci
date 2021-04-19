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
                'message'    => 'Data Berhasil Disimpan!',
            ], 201);
        }
    }

    public function login()
    {
        if ($this->request) {
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $email = $json->email;
                $password = $json->password;
                $user = $this->model->where('email', $email)->first();
                if (password_verify($password, $user['password'])) {
                    return $this->respond([
                        'code' => 201,
                        'message' => 'login berhasil',
                    ], 201);
                } else {
                    return $this->respond([
                        'code' => 201,
                        'message' => 'login gagal',
                    ], 400);
                }
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $user = $this->model->where('email', $email)->first();
                if (password_verify($password, $user['password'])) {
                    return $this->respond([
                        'code' => 201,
                        'message'    => 'login berhasil',
                    ], 201);
                } else {
                    return $this->respond([
                        'code' => 201,
                        'message'    => 'login gagal',
                    ], 400);
                }
            }
        }
    }
}
