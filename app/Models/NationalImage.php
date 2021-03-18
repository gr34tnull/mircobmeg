<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalImage extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'national_images';

    public function bloodline()
    {
        return $this->belongsTo(NationalBloodline::class);
    }
}
