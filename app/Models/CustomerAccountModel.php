<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerAccountModel extends Model
{
    protected $table = 'customer_accounts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'account_number',
        'customer_name',
        'address',
        'phone',
        'email',
        'meter_number',
        'connection_type',
        'status',
    ];

    public function filteredAccounts(?string $search, ?string $status, ?string $type, int $perPage = 10): array
    {
        if ($search !== null && $search !== '') {
            $this->groupStart()
                ->like('account_number', $search)
                ->orLike('customer_name', $search)
                ->orLike('email', $search)
                ->orLike('phone', $search)
                ->orLike('meter_number', $search)
                ->groupEnd();
        }

        if ($status !== null && $status !== '') {
            $this->where('status', $status);
        }

        if ($type !== null && $type !== '') {
            $this->where('connection_type', $type);
        }

        return $this->orderBy('created_at', 'DESC')->paginate($perPage);
    }

    public function countByStatus(string $status): int
    {
        return $this->where('status', $status)->countAllResults();
    }
}
