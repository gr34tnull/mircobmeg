<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalBloodline extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'national_bloodlines';

    public function national()
    {
        return $this->belongsTo(National::class);
    }

    public function images()
    {
        return $this->hasMany(NationalImage::class);
    }
}
