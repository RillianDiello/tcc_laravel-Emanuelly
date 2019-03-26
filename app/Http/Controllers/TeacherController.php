<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::orderBy('created_at', 'desc')->paginate(10);
        return view ('teachers.index', ['teachers' => $teachers]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $teacher = new Teacher;
        $teacher->nome = $request->nome;
        $teacher->identificador = $request->identificador;
        $teacher->save();
        return redirect()->route('teachers.index')->with('message', 'Teacher criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
        $teacher = Teacher::find($teacher->id);
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
        $teacherUpdate = Teacher::findOrfail($teacher->id);
        $teacherUpdate->nome        = $request->nome;
        $teacherUpdate->identificador = $request->identificador;

        $teacherUpdate->save();
        return redirect()->route('teachers.index')->with('message', 'Teacher update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
        $teacherDestroy = Teacher::findOrfail($teacher->id);
        $teacherDestroy->delete();
        return redirect()->route('teachers.index')->with('alert-sucess','teacher hasbeen deleted!');
    }
}
