<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $plan_id
 * @property string $currency
 * @property string $charge_id
 * @property string $method
 * @property float $amount
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Plan $plan
 * @property User $user
 */
class Payment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'plan_id', 'currency', 'charge_id', 'method', 'amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
