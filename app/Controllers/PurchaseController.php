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
        if ($this->request->getJSON()) {
            $json = $this->request->getJSON();
            $data = [
                'invoice_number' => "123",
                'id_customer' => $json->id_customer,
                'total' => $json->total,
            ];
        }
        return json_encode([
            'message' => 'success'
        ]);
    }
}
