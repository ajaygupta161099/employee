<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    use HasFactory;

    // Accessor Mutator

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = ucFirst($value);
    }

        public function setCityAttribute($value)
    {
          $this->attributes['city'] = ucFirst($value);
    }
    public function setStateAttribute($value)
    {
          $this->attributes['state'] = ucFirst($value);
    }
}

