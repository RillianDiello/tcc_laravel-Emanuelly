<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class TypeWork extends Model
{
    //
    protected $fillable = ['nome_tipo', 'identificador'];
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $table = 'typesWorks';
}
