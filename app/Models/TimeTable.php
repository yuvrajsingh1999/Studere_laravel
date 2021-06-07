<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable = ['dept','semester','level','session' ,'schedule'];
    public function alreadyHas($condition)
    {
        return $this->where($condition)->exists();
    }
}
