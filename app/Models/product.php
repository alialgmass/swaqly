<?php

namespace App\Models;

use App\model\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'trader_id',
        'catoger_id'
       
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
