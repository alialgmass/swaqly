<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_name extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
       
        'catoger_id'
       
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'catoger_id', 'id');
    }
}
