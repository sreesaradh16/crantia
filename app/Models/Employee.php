<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'gender_id',
        'name',
        'dob',
    ];

    public function Department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }
}
