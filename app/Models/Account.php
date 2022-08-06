<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'type',
        'amount',
        'remark'
    ];

    public const ACCOUNT_TYPE_CREDIT = 1;
    public const ACCOUNT_TYPE_DEBIT = 2;

    public function customer()
    {
        return $this->belongsto(Customer::class);
    }

    public function AccountTypeMapping()
    {
        return [
            self::ACCOUNT_TYPE_CREDIT => 'Credit',
            self::ACCOUNT_TYPE_DEBIT => 'Debit',
        ];
    }
    
}
