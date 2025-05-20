<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'nama_menu', 'deskripsi', 'harga'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
