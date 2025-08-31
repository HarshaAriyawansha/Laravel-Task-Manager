<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['title','description','status'];



    // If you want to keep created_at but not updated_at
    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;
}
