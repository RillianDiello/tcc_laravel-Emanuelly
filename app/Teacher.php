<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    //
    protected $fillable = ['nome', 'identificador'];
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $table = 'teachers';
}
