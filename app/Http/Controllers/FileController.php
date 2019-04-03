<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return View('files.index')->with('files', $files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('files.create');
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
            'titulo' => 'required:max:255',
            'resumo' => 'required',
            'price' => 'required|numeric'
          ]);

          auth()->user()->files()->create([
            'title' => $request->get('title'),
            'overview' => $request->get('overview'),
            'price' => $request->get('price')
          ]);

          return back()->with('message', 'Your file is submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $f = File::find($file->id);
        return response()->download(storage_path('app/public/logos/' . $f->filename));
    }

    public function uploadFile(){
        return view('files.uploadfile');
    }
    public function uploadFilePost(Request $request){

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
            $file->save();

            return back()
                ->with('success','You have successfully upload image.');
       }else {
            return back()
                ->with('error','You have not successfully upload image.');
       }


    }
    public function upload() {

        $uploadedFile = $request->file('file');
      $filename = time().$uploadedFile->getClientOriginalName();

      Storage::disk('local')->putFileAs(
        'files/'.$filename,
        $uploadedFile,
        $filename
      );

      $upload = new Upload;
      $upload->filename = $filename;

      $upload->user()->associate(auth()->user());

      $upload->save();

      return response()->json([
        'id' => $upload->id
      ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
