<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
      'first_name',
      'last_name',
      'patronymic',
      'salary',
      'gender_id',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}
