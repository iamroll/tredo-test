<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeDepartment extends Model
{
    protected $table = 'departments_of_employees';
    protected $fillable = ['employee_id', 'department_id'];
    public $timestamps = false;
}
