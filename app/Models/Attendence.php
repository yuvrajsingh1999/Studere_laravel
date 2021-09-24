<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

    protected $table = 'student_attendence';

    public $primaryKey = 'id';
    protected $fillable = ['lectur_code', 'date', 'roll_no', 'attendence','session'];
}
