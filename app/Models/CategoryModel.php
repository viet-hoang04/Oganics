<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'CategoryName','Description','Status'
    ];
    protected $table = 'db_categories';
    protected $primaryKey = 'CategoryID';
    public $timestamps = false; // Vô hiệu hóa timestamps

}
 