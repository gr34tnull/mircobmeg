<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVideo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'product_videos';

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
