<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    use HasFactory;
    protected $table = 'complete';
    protected $fillable = array('userid', 'lessonid');
    public $timestamps = false; 
}
