<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'principal',
        'interest',
        'payment',
        'interest_type',
        'tenure',
    ];

    public const INTEREST_TYPE_PERCENT = 1;
    public const INTEREST_TYPE_VALUE = 2;

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_loan', 'loan_id', 'customer_id');
    }

    public static function interestTypeMapping()
    {
        return [
            self::INTEREST_TYPE_PERCENT => 'Percent',
            self::INTEREST_TYPE_PERCENT => 'Percent',
        ];
    }

}
