<?php

namespace App\Http\Controllers;

use App\Course;
use App\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::all();
        return View('courses.create')->with('institutions', $institutions);
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
            'identificador'=> 'required',
            'institution_id'=> 'required'
          ]);
          $course = new Course([
            'nome' => $request->get('nome'),
            'identificador'=> $request->get('identificador'),
            'institution_id'=> $request->get('institution_id')
          ]);

          $course->save();
          return redirect('/courses')->with('success', 'Curso '.$request->get('name').' adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return View('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $nc = Course::find($course->id);
        $nc->nome = $request->get('nome');
        $nc->identificador = $request->get('identificador');
        $nc->save();
        return redirect('/courses')->with('success', 'Curso '.$nc->nome.' atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $deleted = Course::find($course->id);
        $name = $deleted->name;
        $deleted->delete();

        return redirect('/courses')->with('success', 'Curso '. $name .' excluído com sucesso');
    }
}
