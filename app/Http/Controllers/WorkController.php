<?php

namespace App\Http\Controllers;

use App\Work;
use App\Course;
use App\Institution;
use App\Teacher;
use App\Student;
use App\TypeWork;
use App\File;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return view('works.index')->with('works', $works);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $institutions = Institution::all();
        $teachers = Teacher::all();
        $students = Student::all();
        $worktypes = TypeWork::all();
        $files = File::all();
        return View('works.create')
            ->with('courses', $courses)
            ->with('institutions', $institutions)
            ->with('teachers', $teachers)
            ->with('students', $students)
            ->with('worktypes', $worktypes)
            ->with('files', $files);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $f = $_FILES['fileToUpload'];
        $path = $request->file('fileToUpload')->getRealPath();
        $file = new File([
            'filename' => $f['name'],
            'path'  => $path,
            'mime'=> $f['type'],
            'size'=> $f['size'],
          ]);

        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);

       if($request->fileToUpload->storeAs('logos',$file['filename'])) {
            $work = new Work([
                'titulo' => $request->get('titulo'),
                'tema'=> $request->get('tema'),
                'palavras_chaves' => $request->get('palavras_chaves'),
                'resumo' => $request->get('resumo'),
                'data_apresentacao' => $request->get('data_apresentacao'),
                'instituicao_id' => $request->get('instituicao_id'),
                'curso_id' => $request->get('curso_id'),
                'professor_id' => $request->get('professor_id'),
                'aluno1_id' => $request->get('aluno1_id'),
                'aluno2_id' => $request->get('aluno2_id'),
                'tipo_trabalho_id' => $request->get('tipo_trabalho_id')
              ]);
            if($file->save()) {
                $work->arquivo_id = $file->id;
                if($work->save()) {
                    return back()->with('success','Trabalho submetido com sucesso!');
                } else {
                    Storage::delete($f->filename);
                }

            }else {
                Storage::delete($f->filename);
            }

       }else {
            return back()->with('error','Erro ao submeter trabalho!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
