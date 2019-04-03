<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    protected $fillable = ['nome', 'identificador', 'institution_id'];
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $table = 'courses';
     /**
     * Get the Institution that owns the course.
     */
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }
}
