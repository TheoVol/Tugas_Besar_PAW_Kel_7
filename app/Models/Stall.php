<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    protected $fillable = ['nama_usaha', 'kantin_id', 'user_id'];

    public function kantin() {
        return $this->belongsTo(Kantin::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
