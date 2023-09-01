<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'employee_fname', 'salary', 'Departement', 'Job_title'
    ];
}
