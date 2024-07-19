<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'OrderID','ProductName','Quantity','UnitPrice','Subtotal','Status'
    ];
    protected $table = 'db_orderdetails';
    protected $primaryKey = 'OrderDetailID'; 
    public $timestamps = false; // Vô hiệu hóa timestamps
}
