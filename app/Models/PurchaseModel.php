<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
    protected $table = 'purchase';
    protected $primaryKey = 'id_purchase';

    // allowed 
    protected $allowedFields = ['id_purchase', 'invoice_number', 'id_customer', 'total'];
}
