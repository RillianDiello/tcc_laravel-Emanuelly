<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::all();
        return view('institutions.index')->with('institutions', $institutions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('institutions.create');
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
            'identificador'=> 'required'
          ]);
          $institution = new Institution([
            'nome' => $request->get('nome'),
            'identificador'=> $request->get('identificador')
          ]);

          $institution->save();
          return redirect('/institutions')->with('success', 'Instituição adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return View('institutions.show')->with('institution', $institution);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        return view('institutions.edit')->with('institution', $institution);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        $ni = Institution::find($institution->id);
        $ni->nome = $request->get('nome');
        $ni->identificador = $request->get('identificador');
        $ni->save();
        return redirect('/institutions')->with('success', 'Instituição atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        $deleted = Institution::find($institution->id);
        $deleted->delete();

        return redirect('/institutions')->with('success', 'Instituição excluída com sucesso');
    }
}
