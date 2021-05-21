<?php

namespace App\Controllers;

use App\Models\PurchaseModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;


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
        $date       = Time::createFromDate();
        $inv = $date->getTimestamp();

        $myTime = new Time('now', 'Asia/Bangkok', 'en_US');

        if ($this->request) {
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $data = [
                    'invoice_number' => 'INV/40559/MKRN/' .  $myTime->getTimestamp(),
                    'id_customer' => $json->id_customer,
                    'total' => $json->total,
                ];
                // $this->model->insert($data);
            } else {
                $data = [
                    'invoice_number' => $this->request->getPost('invoice_number'),
                    'id_customer' => $this->request->getPost('id_customer'),
                    'total' => $this->request->getPost('total')
                ];
            }
            $this->model->insert($data);
            $this->model->query('CALL delete_cart(' . $json->id_customer . ')');

            return json_encode([
                'message' => 'success'
            ]);
        }
    }

    public function purchaseView()
    {
        return view('cart/purchase');
    }

    public function purchaseDetail($id_customer)
    {
        $purchase = $this->model->where('id_customer', $id_customer)->get()->getResultArray();;
        // $purchase = $this->model->where('id_customer', $id_customer)->first();;
        return json_encode($purchase);
    }

    public function purchaseTotal($id_customer)
    {
        // $purchase = $this->model->where('id_customer', $id_customer)->get()->getResultArray();;
        $purchase = $this->model->where('id_customer', $id_customer)->orderBy('id_purchase', 'desc')->first();
        return json_encode($purchase);
    }

    public function pay($id_purchase)
    {
        if ($this->request->getJSON()) {
            $json = $this->request->getJSON();

            $data = [
                'status_payment' => $json->status_payment,
            ];
        } else {
            $data = [
                'status_payment' => $this->request->getPost('status_payment'),
            ];
        }
        // var_dump($id_purchase, $data);
        // die;
        $this->model->update($id_purchase, $data);
        return json_encode([
            'message' => 'success'
        ]);
    }

    public function updateTotal($id_purchase)
    {
        if ($this->request->getJSON()) {
            $json = $this->request->getJSON();

            $data = [
                'total' => $json->total
            ];
            $this->model->update($id_purchase, $data);
        }
        return json_encode([
            'message' => 'Berhasil Update'
        ]);
    }

    public function checkPurchase($id_customer)
    {
        // status yang akan di bayar nanti
        $purchase = $this->model->where('id_customer', $id_customer)->get()->getResultArray();
        return json_encode($purchase);
    }

    public function paymentView()
    {
        return view('cart/payment');
    }
    public function paymentDetail($id)
    {
        return view('cart/payment_detail');
    }

    public function paymentDetailJSON($id_purchase)
    {
        // $purchase = $this->model->where('id_customer', $id_customer)->get()->getResultArray();;
        $purchase = $this->model->where('id_purchase', $id_purchase)->first();
        return json_encode($purchase);
    }

    public function paymentListJSON()
    {
        $result = $this->model->findAll();
        return json_encode($result);
    }
}
