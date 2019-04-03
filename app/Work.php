<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Work extends Model
{
    protected $fillable = [
        'titulo', 'tema', 'palavras_chaves', 'resumo', 'data_apresentacao', 'instituicao_id', 'curso_id', 'professor_id',
        'aluno1_id', 'aluno2_id', 'tipo_trabalho_id', 'arquivo_id'
        ];
    protected $guarded = ['id'];
    protected $table = 'works';

    public function institution() {
        return $this->hasOne('App\Institution', 'id');
    }
    public function file() {
        return $this->hasOne('App\File', 'id');
    }
    public function student1() {
        return $this->hasOne('App\Student','id', 'aluno1_id');
    }
    public function student2() {
        return $this->hasOne('App\Student','id', 'aluno2_id');
    }
    public function course() {
        return $this->hasOne('App\Course', 'id');
    }
    public function teacher() {
        return $this->hasOne('App\Teacher', 'id');
    }
    public function typework() {
        return $this->hasOne('App\TypeWork', 'id');
    }

}
