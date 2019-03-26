<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = ['nome', 'identificador'];
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $table = 'courses';
    //
}
