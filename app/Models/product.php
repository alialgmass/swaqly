<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Trader;
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
        return $this->belongsTo(Category::class, 'catoger_id', 'id');
    }
    public function trader()
    {
        return $this->belongsTo(Trader::class, 'trader_id', 'id');
    }
}
