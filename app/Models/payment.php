<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'metode'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
