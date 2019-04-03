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
        $types = TypeWork::all();
        return view('typeworks.index')->with('typeworks', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('typeworks.create');
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
            'nome_tipo'=>'required',
            'identificador'=> 'required'
          ]);
          $typework = new TypeWork([
            'nome_tipo' => $request->get('nome_tipo'),
            'identificador'=> $request->get('identificador')
          ]);

          $typework->save();
          return redirect('/typesworks')->with('success', 'Tipo de Trabalho adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function show($typeWork)
    {
        $type = TypeWork::find($typeWork);
        return View('typeworks.show')->with('typework', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function edit($typeWork)
    {
        $type = TypeWork::find($typeWork);
        return view('typeworks.edit')->with('typework', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $typeWork)
    {
        $nt = TypeWork::find($typeWork);
        $nt->nome_tipo = $request->get('nome_tipo');
        $nt->identificador = $request->get('identificador');
        $nt->save();
        return redirect('/typesworks')->with('success', 'Tipo de Trabalho atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeWork  $typeWork
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeWork)
    {
        $deleted = TypeWork::find($typeWork);
        $deleted->delete();

        return redirect('/typesworks')->with('success', 'Tipo de Trabalho excluído com sucesso');
    }
}
