<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'ImageID','ProductID','Image'
    ];
    protected $primarykey = 'ImageID';
    protected $table = 'db_imgs';
}
