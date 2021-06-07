<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'material';

    public $primaryKey = 'id';
     protected $fillable = [
        'file_name',
        'file_path',
        'department',
        'session',
        'semester',
        'class'
    ];
}
