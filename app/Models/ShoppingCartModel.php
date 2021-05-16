<?php

namespace App\Models;

use CodeIgniter\Model;

class ShoppingCartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id_cart';

    protected $allowedFields = ['id_customer', 'id_product', 'quantity', 'price'];
    public function getCustomer()
    {
        return $this->db->table('customers')
            ->join('customers', 'customers.id_customer=cart.id_customer')
            ->get()->getResultArray();
    }

    public function getProducts()
    {
        return $this->db->table('products')
            ->join('products', 'products.id=cart.id_product')
            ->get()->getResultArray();
    }

    public function getShopping($id_customer)
    {
        return $this->db->table('cart')
            ->select(['*', 'cart.price as sub_total'])
            ->join('products', 'products.id=cart.id_product')
            ->where('id_customer', $id_customer)
            ->get()->getResultArray();
    }

    public function cart_count($id_cart)
    {
        $result = $this->db->table('cart')->where('id_customer', $id_cart)->get()->getResultArray();
        return count($result);
    }

    public function product_cart_validation($id_product, $id_customer)
    {
        return $this->db->table('cart')
            ->where('id_customer', $id_customer)
            ->where('id_product', $id_product)
            ->get()->getResultArray();
    }

    public function sum_total($id_customer)
    {
        return $this->db->table('cart')
            ->selectSum('price')
            ->where('id_customer', $id_customer)
            ->get()->getResultArray();
    }
}
