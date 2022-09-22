<?php

namespace App\Http\Controllers;

use App\Models\Remesa;
use Illuminate\Http\Request;

class RemesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $remesas = Remesa::all();
        return view('remesa.index', compact('remesas'));
        
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
        Remesa::create([
            'name_remesa' => $request->Name,
            'month' => $request->Mounth,
            'annio' => $request->Annio,
            'amount' => $request->Amount,
            

        ]);
        return redirect('/remesa')->with('Mensaje', 'HEY, Remesa creada satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function show(Remesa $remesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $remesa = Remesa::findOrFail($id);
        return view('remesa.edit', ['remesa' => $remesa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $remesa = Remesa::findOrFail($id);
            $remesa->name_remesa = $request->Name;
            $remesa->month = $request->Mounth;
            $remesa->annio = $request->Annio;
            $remesa->amount = $request->Amount;
            $remesa->save();
            return redirect('/remesa')->with('Mensaje', 'HEY, Remesa actualizado satisfactoriamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remesa $remesa)
    {
        //
        $remesa->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Remesa eliminada satisfactoriamente!!!');
    }
}
