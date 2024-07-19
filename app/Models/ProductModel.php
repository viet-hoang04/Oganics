<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'ProductName','CategoryID','Description','Price','Views','Image','StockQuantity'
    ];
    protected $table = 'db_products';
    protected $primaryKey = 'ProductID'; 
    public $timestamps = false; // Vô hiệu hóa timestamps

}
