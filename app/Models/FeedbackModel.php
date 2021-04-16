<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'customer_feedback';
    protected $primaryKey = 'id_feedback';

    public function getCustomer()
    {
        return $this->db->table('customer_feedback')
            ->join('customers', 'customers.id_customer=customer_feedback.id_customer')
            ->get()->getResultArray();
    }
}
