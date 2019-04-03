<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'sobrenome' => 'required',
            'email'     => 'required|email',
            'fone'  =>  'required'
          ]);
          $student = new Student([
            'nome' => $request->get('nome'),
            'sobrenome'    => $request->get('sobrenome'),
            'email'        => $request->get('email'),
            'fone'     => $request->get('fone')
          ]);

          $student->save();
          return redirect('/students')->with('success', 'Estudante adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return View('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $ns = Student::find($student->id);
        $ns->nome = $request->get('nome');
        $ns->sobrenome = $request->get('sobrenome');
        $ns->email = $request->get('email');
        $ns->fone = $request->get('fone');
        $ns->save();
        return redirect('/students')->with('success', 'Estudante atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $deleted = Student::find($student->id);
        $deleted->delete();

        return redirect('/students')->with('success', 'Estudante excluído com sucesso');
    }
}
