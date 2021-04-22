<?php

namespace App\Models;

use CodeIgniter\Model;

class ShoppingCartModel extends Model
{
    protected $table = 'shopping_cart';
    protected $primaryKey = 'id_cart';


    protected $allowedFields = ['id_customer', 'id_product', 'quantity', 'price'];
}
