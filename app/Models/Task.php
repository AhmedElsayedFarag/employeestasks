<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'status',
        'employee_id',
        'manager_id',
    ];
    public function manager(){
        return $this->belongsTo(User::class,'manager_id');
    }
    public function employee(){
        return $this->belongsTo(User::class,'employee_id');
    }
}
