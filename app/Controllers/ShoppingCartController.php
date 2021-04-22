<?php

namespace App\Controllers;

use App\Models\ShoppingCartModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class ShoppingCartController extends BaseController
{
    use ResponseTrait;
    protected $model;
    public function __construct()
    {
        $this->model = new ShoppingCartModel();
    }
    public function cart()
    {
        if ($this->request) {
            //get request from Vue Js
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $data = [
                    'id_customer'   => $json->id_customer,
                    'id_product' => $json->id_product,
                    'quantity' => $json->quantity,
                    'price' => $json->price
                ];
            } else {
                $data = [
                    'id_customer'   => $this->request->getPost('id_customer'),
                    'id_product' => $this->request->getPost('id_product'),
                    'quantity' => $this->request->getPost('quantity'),
                    'price' => $this->request->getPost('price'),
                ];
            }
            $this->model->insert($data);
            // return $this->respond([
            //     'code' => 201,
            //     'message' => 'Add to cart successfully'
            // ], 201);
            return view('cart/cart');
        }
    }

    public function get_cart()
    {
    }

    public function get_cartJSON()
    {
        $cart = $this->model->findAll();
        return json_encode($cart);
    }

    public function cart_view()
    {
        return view('cart/cart');
    }
}
