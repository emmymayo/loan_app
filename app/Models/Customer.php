<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'account_info',
    ];

    public function loans()
    {
        return $this->belongsToMany(Loan::class, 'customer_loan', 'customer_id', 'loan_id');
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public static function statusMapping()
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE => 'Inactive'
        ];
    }
}
