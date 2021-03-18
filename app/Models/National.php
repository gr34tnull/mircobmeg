<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class National extends Model
{
    use Searchable;
    use HasFactory;

    protected $guarded = [];
    protected $table = 'nationals';

    public function achievements()
    {
        return $this->hasMany(NationalAchievement::class);
    }

    public function bloodlines()
    {
        return $this->hasMany(NationalBloodline::class);
    }

    public function videos()
    {
        return $this->hasMany(NationalVideo::class);
    }
}
