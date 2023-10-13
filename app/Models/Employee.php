<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    // Accessor  Mutotar

    public function setEmployeenameAttribute($value)
    {
        $this->attributes['employee_name'] = ucFirst($value);
    }

        public function setDepartmentAttribute($value)
    {
          $this->attributes['department'] = ucFirst($value);
    }

    // Relation

    public function employeeAddress(): HasOne
    {
        return $this->hasOne(EmployeeAddress::class,);
    }

    public function employeeSalary(): HasOne
    {
        return $this->hasOne(EmployeeSalary::class,);
    }
}
