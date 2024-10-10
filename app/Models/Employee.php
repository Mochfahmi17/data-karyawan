<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name', 'ein', 'position', 'departmen_division', 'start_date', 'employment_status', 'base_salary', 'bank_account'];
}
