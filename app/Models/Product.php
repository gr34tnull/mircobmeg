<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    use HasFactory;

    protected $guarded = [];
    protected $table = 'products';

    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductComment::class);
    }
}
