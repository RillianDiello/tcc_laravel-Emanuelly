<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);
        return view ('courses.index', ['institutions' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
        $course = new Course;
        $course->nome = $request->nome;
        $course->identificador = $request->identificador;
        $course->save();
        return redirect()->route('courses.index')->with('message', 'Curso criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        $course = Course::find($course->id);
        return view('courses.edit',compact('course'));

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
        //
        $courseUpdate = Course::findOrfail($course->id);
        $courseUpdate->nome        = $request->nome;
        $courseUpdate->identificador = $request->identificador;

        $courseUpdate->save();
        return redirect()->route('courses.index')->with('message', 'Curso update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $courseDestroy = Course::findOrfail($course->id);
        $courseDestroy->delete();
        return redirect()->route('courses.index')->with('alert-sucess','Course hasbeen deleted!');
    }
}
