<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'CustomerID','total','status'
    ];
    protected $table = 'db_orders';
    protected $primaryKey = 'OrderID'; 
    public $timestamps = false; // Vô hiệu hóa timestamps
}
