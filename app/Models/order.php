<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
       use HasFactory;

    protected $fillable = ['user_id', 'vendor_id', 'total_harga', 'status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
