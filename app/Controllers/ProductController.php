<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function index()
    {
        // read all data
        return view('products/index');
    }

    // reload JSON
    public function productJSON()
    {
        $products = $this->model->findAll(4);
        // return json_encode([
        //     'message' => 'Success',
        //     'code' => 200,
        //     'data' => $products,
        // ]);

        return json_encode($products);
    }

    public function getAllProduct()
    {
        return view('products/index_all');
    }

    public function getAllProductJSON()
    {
        $products = $this->model->findAll();
        return json_encode($products);
    }

    public function productDetail($id)
    {
        return view('products/detail');
    }

    public function productDetailJSON($id)
    {
        $product = $this->model->where('id', $id)->first();
        return json_encode($product);
    }
}
