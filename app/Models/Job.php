<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_list';

    protected $fillable = ['employee_id','name', 'price'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_list_id');
    }
}
