<?php

namespace App\Http\Controllers;

use App\TypeWork;
use Illuminate\Http\Request;

class TypeWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $typeWork = TypeWork::orderBy('created_at', 'desc')->paginate(10);
        return view ('typeWorks.index', ['typeWorks' => $typeWorks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('typeWorks.create');
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
        $typeWork = new TypeWork;
        $typeWork->nome        = $request->nome;
        $typeWork->identificador = $request->identificador;       
        $typeWork->save();
        return redirect()->route('typeWorks.index')->with('message', 'TypeWork created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function show(TypeWork $typeWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeWork $typeWork)
    {
        //
        $typeWork = TypeWork::find($typeWork->id);
        return view('typeWorks.edit',compact('typeWork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeWork $typeWork)
    {
        //
        $typeWorkUpdate = TypeWork::findOrfail($typeWork->id);
        $typeWorkUpdate->nome        = $request->nome;
        $typeWorkUpdate->identificador = $request->identificador;

        $typeWorkUpdate->save();
        return redirect()->route('typeWorks.index')->with('message', 'TypeWork update successfully');
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeWork $typeWork)
    {
        //
        $teacherDestroy = Teacher::findOrfail($teacher->id);
        $teacherDestroy->delete();
        return redirect()->route('teachers.index')->with('alert-sucess','teacher hasbeen deleted!');
    }
}
