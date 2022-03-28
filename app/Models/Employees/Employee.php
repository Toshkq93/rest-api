<?php

namespace App\Models\Employees;

use App\Models\Departments\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    /**
     * @return Attribute
     */
    protected function fio(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($this->last_name) . ' ' . ucfirst($this->first_name) . ' ' . ucfirst($this->patronymic),
        );
    }

    /**
     * @return BelongsToMany
     */
    public function departments(): belongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    /**
     * @return HasOne
     */
    public function gender(): hasOne
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}
