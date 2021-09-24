<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyAttendence extends Model
{
    use HasFactory;

    protected $table = 'faculty_attendence';

    public $primaryKey = 'id';
    protected $fillable = [ 'date', 'faculty_id', 'attendence','session'];
}
