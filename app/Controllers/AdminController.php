<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PurchaseModel;
use CodeIgniter\API\ResponseTrait;

class AdminController extends BaseController
{
    use ResponseTrait;

    protected $model, $modelAdmin;

    public function __construct()
    {
        $this->model = new PurchaseModel();
        $this->modelAdmin = new AdminModel();
    }

    public function index()
    {
        return view('admin/admin');
    }

    public function login()
    {
        if ($this->request) {
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $email = $json->email;
                $password = $json->password;
                $user = $this->modelAdmin->where('email', $email)->first();

                if ($password) {
                    // $key = $this->getKey();
                    $iat = time();
                    $nbf = $iat + 10;
                    $exp = $iat + 3600;

                    $payload = array(
                        "iss" => "The_claim",
                        "aud" => "The_Aud",
                        "iat" => $iat,
                        "nbf" => $nbf,
                        "exp" => $exp,
                        "data" => $user['name'],
                    );

                    // $token = JWT::encode($payload, $key);
                    // $decoded = JWT::decode($token, $key, array("HS256"));

                    // if ($decoded) {
                    return $this->respond([
                        'code' => 201,
                        'message' => 'Login berhasil',
                        // 'id' => $user['id_customer'],
                        // 'email' => $user['email'],
                        // 'name' => $user['name'],
                        'logged_in' => TRUE,
                        // 'token' => $token
                    ], 201);
                    // } else {
                    //     return $this->respond([
                    //         'code' => 400,
                    //         'message' => 'Login gagal, cek kembali email & password',
                    //     ], 400);
                    // }

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

                    // $key = $this->getKey();
                    $iat = time();
                    $nbf = $iat + 10;
                    $exp = $iat + 3600;

                    $payload = array(
                        "iss" => "The_claim",
                        "aud" => "The_Aud",
                        "iat" => $iat,
                        "nbf" => $nbf,
                        "exp" => $exp,
                        "data" => $user,
                    );

                    // $token = JWT::encode($payload, $key);
                    // $decoded = JWT::decode($token, $key, array("HS256"));

                    // if ($decoded) {
                    //     return $this->respond([
                    //         'code' => 201,
                    //         'message'    => 'Login berhasil',
                    //         'token' => $token
                    //     ], 201);
                    // } else {
                    return $this->respond([
                        'code' => 400,
                        'message'    => 'Login gagal, cek kembali email & password',
                    ], 400);
                    // }
                } else {
                    return $this->respond([
                        'code' => 400,
                        'message'    => 'Login gagal, cek kembali email & password',
                    ], 400);
                }
            }
        }
    }

    public function purchaseControl()
    {
        return view('admin/purchase');
    }

    public function purchaseControlJSON()
    {
        $purchase = $this->model->getPurchase();
        return json_encode($purchase);
    }

    public function updateStatusPurchase($id_purchase)
    {
        if ($this->request->getJSON()) {
            $json = $this->request->getJSON();
            $data = [
                'status_payment' => $json->status_payment,
            ];
            $status = $data['status_payment'];
            if ($status == 'konfirmasi') {
                $status_payment = 'kemas';
            } else if ($status == 'kemas') {
                $status_payment = 'kirim';
            }
            $update = [
                'status_payment' => $status_payment
            ];

            $this->model->update($id_purchase, $update);
        }
        return json_encode([
            'message' => 'Status Berhasil Di Update'
        ]);
    }

    public function produk()
    {
        echo 'Test View Produk Admin';
    }
}
