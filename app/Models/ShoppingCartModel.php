<?php

namespace App\Models;

use CodeIgniter\Model;

class ShoppingCartModel extends Model
{
    protected $table = 'shopping_cart';
    protected $primaryKey = 'id_cart';


    protected $allowedFields = ['id_customer', 'id_product', 'quantity', 'price'];
    public function getCustomer()
    {
        return $this->db->table('customers')
            ->join('customers', 'customers.id_customer=shopping_cart.id_customer')
            ->get()->getResultArray();
    }

    public function getProducts()
    {
        return $this->db->table('products')
            ->join('products', 'products.id=shopping_cart.id_product')
            ->get()->getResultArray();
    }
}
