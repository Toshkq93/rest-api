<?php

namespace App\Models\Departments;

use App\Models\Employees\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * @return belongsToMany
     */
    public function employees(): belongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }

    public function countEmployees()
    {
        return $this->employees()->count();
    }

    public function maxSalary()
    {
        return $this->employees()->max('salary');
    }
}
