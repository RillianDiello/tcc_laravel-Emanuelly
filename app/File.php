<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class File extends Model
{
    //
    protected $fillable = ['filename', 'mime','path','size'];
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $table = 'files';

}
