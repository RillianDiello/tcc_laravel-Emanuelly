<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    //
    protected $fillable = ['nome', 'sobrenome', 'email', 'fone'];
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $table = 'students';
}
