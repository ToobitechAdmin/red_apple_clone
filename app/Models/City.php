<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function area()
    {
        return $this->hasMany(Area::class,'city_id','id');
    }
    public function branch()
    {
        return $this->hasMany(Branch::class,'city_id','id');
    }
}
