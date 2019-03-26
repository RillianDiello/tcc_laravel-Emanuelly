<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;
// use App\Http\Requests\InstitutionRequest;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::orderBy('created_at', 'desc')->paginate(10);
        return view('institutions.index',['institutions' => $institutions]);       
    }
  
    public function create()
    {
        return view('institutions.create');
    }


    public function store(Request $request)
    {
        $institution = new Institution;
        $institution->nome        = $request->nome;
        $institution->identificador = $request->identificador;       
        $institution->save();
        return redirect()->route('institutions.index')->with('message', 'Institution created successfully!');
    }
  
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);
        return view('institutions.edit',compact('institution'));
    }
  
    public function update(Request $request, $id)
    {
        $institution = Institution::findOrFail($id);
        $institution->nome        = $request->nome;
        $institution->identificador = $request->identificador;
        
        $institution->save();
        return redirect()->route('institutions.index')->with('message', 'institution updated successfully!');
    }
  
    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();
        return redirect()->route('institutions.index')->with('alert-success','Institution hasbeen deleted!');
    }
}
