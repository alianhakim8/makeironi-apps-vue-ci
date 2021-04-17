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
        //get request from PostMan and more
        $data = [
            'name'     => $this->request->getPost('nama'),
            'email'   => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'address' => $this->request->getPost('alamat'),
            'phone_number' => $this->request->getPost('noHP'),
            'date_of_birth' => $this->request->getPost('tanggalLahir'),
        ];
        $data = json_decode(file_get_contents("php://input"));
        return $data;
        // $model->insert($data);
    }
}
