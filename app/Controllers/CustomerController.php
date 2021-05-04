<?php

namespace App\Controllers;

use App\Models\FeedbackModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
{

    protected $model;

    public function login()
    {
        return view('customers/login');
    }

    public function __construct()
    {
        $this->model = new FeedbackModel();
    }

    public function feedbackJSON()
    {
        $model = $this->model->getCustomer();
        return json_encode($model);
    }  

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }
}
