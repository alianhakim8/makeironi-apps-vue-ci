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

            $valid = $this->model->product_cart_validation($json->id_product, $json->id_customer);
            // var_dump(, );
            // die;


            if (count($valid) == 0) {

                $this->model->insert($data);

                return $this->respond([
                    'code' => 201,
                    'message' => 'Berhasil menambahkan ke cart'
                ], 201);
            } else {

                if ($valid[0]['id_product'] == $json->id_product && $valid[0]['id_customer'] == $json->id_customer) {
                    return $this->respond([
                        'code' => 500,
                        'message' => 'Produk sudah ada di cart'
                    ], 500);
                } else if ($valid[0]['id_product'] != $json->id_product && $valid[0]['id_customer'] == $json->id_customer) {

                    $this->model->insert($data);

                    return $this->respond([
                        'code' => 201,
                        'message' => 'Berhasil menambahkan ke cart'
                    ], 201);
                }
            }
            // try {
            //     if ($valid[0]['id_product'] != $data['id_product'] && $valid[0]['id_customer'] == $data['id_customer']) {
            //         $this->model->insert($data);

            //         return $this->respond([
            //             'code' => 201,
            //             'message' => 'Add to cart successfully'
            //         ], 201);
            //     } else {
            //         return $this->respond([
            //             'code' => 500,
            //             'message' => 'Add to cart successfully'
            //         ], 500);
            //     }
            //     // return view('cart/cart');

            // } catch (\Throwable $th) {
            //     return json_encode([
            //         'error' => $th->getMessage()
            //     ], 500);
            // }

            // if (count($valid) > 0) {
            // $update_rows = array('quantity' => $new_quantity);
            // $this->model->where('id_customer', $json->id_customer);
            // $this->model->where('id_product', $json->id_product);
            // $this->model->update($update_rows);
            // } else {

            // }
            // return $this->respond([
            //     'code' => 201,
            //     'message' => 'Add to cart successfully'
            // ], 201);
        }
    }

    public function update_cart_quantity($id_cart)
    {
        if ($this->request->getJSON()) {
            $json = $this->request->getJSON();
            $data = [
                'price' => $json->price,

                'quantity' => $json->quantity,
            ];
            $this->model->update($id_cart, $data);
        }
        return json_encode([
            'message' => 'success'
        ]);
    }

    public function get_cartJSON($id_customer)
    {
        $cart = $this->model->getShopping($id_customer);
        // dd($cart);
        return json_encode($cart);
    }

    public function cart_view()
    {
        return view('cart/cart');
    }

    public function remove_cart($id_cart)
    {
        $this->model->where('id_cart', $id_cart)->delete();
        return json_encode([
            'message' => 'success deleted'
        ]);
    }

    public function cart_count($id_cart)
    {
        $result = $this->model->cart_count($id_cart);

        return json_encode($result);
    }

    public function total_sum($id_customer)
    {
        $cart = $this->model->sum_total($id_customer);
        return json_encode($cart);
    }
}
