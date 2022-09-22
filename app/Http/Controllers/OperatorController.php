<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operators = Operator::all();
       
        return view('operator.index', compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $path_img = 'profile_pic';
        $file = $request->file('Photography');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file));
        
        //guardar datos
        Operator::create([
            'name' => $request->Name,
            'code' => $request->Code,
            'phone' => $request->Phone,
            'photography' => $nombre,
            

        ]);
        return redirect('/operator')->with('Mensaje', 'HEY, Operador creado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $operator = Operator::findOrFail($id);
        return view('operator.edit', ['operator' => $operator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $path_img = 'profile_pic';
        $file = $request->file('Photography');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file));

            $operator = Operator::findOrFail($id);
            $operator->name = $request->Name;
            $operator->code = $request->Code;
            $operator->phone = $request->Phone;
            $operator->photography = $nombre;
            $operator->save();
            return redirect('/operator')->with('Mensaje', 'HEY, Operador actualizado satisfactoriamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        //
        $operator->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Operador eliminado satisfactoriamente!!!');
    }
}
