<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Product;

class Category extends Model
{
    use HasFactory;
   protected $table='catogers';
    protected $fillable=[
        'name',

    ];
    public function product()
{
    return $this->hasMany(Product::class,'catoger_id', 'id');
}
}
