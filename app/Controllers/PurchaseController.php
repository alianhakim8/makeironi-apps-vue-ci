<?php

namespace App\Controllers;

use App\Models\PurchaseModel;
use CodeIgniter\API\ResponseTrait;

class PurchaseController extends BaseController
{
    use ResponseTrait;
    protected $model;
    public function __construct()
    {
        $this->model = new PurchaseModel();
    }
    public function purchase()
    {
        if ($this->request) {
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $data = [
                    'invoice_number' => "123",
                    'id_customer' => $json->id_customer,
                    'total' => $json->total,
                ];
            } else {
                $data = [
                    'invoice_number' => $this->request->getPost('invoice_number'),
                    'id_customer' => $this->request->getPost('id_customer'),
                    'total' => $this->request->getPost('total')
                ];
            }

            $this->model->insert($data);
            return json_encode([
                'message' => 'success'
            ]);
        }
    }

    public function purchaseView()
    {
        return view('cart/purchase');
    }
}
